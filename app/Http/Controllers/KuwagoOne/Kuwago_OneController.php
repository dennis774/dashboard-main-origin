<?php

namespace App\Http\Controllers\KuwagoOne;

use App\Models\User;
use App\Models\FakeData;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Kuwago_OneController extends Controller
{
    // for /kuwago-one
    public function general_kuwago_one(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeData::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                SUM(sales) as sales, SUM(expenses) as expenses, SUM(orders) as orders
            '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->orders = $item->orders;
                $item->date = $this->formatDate($interval, $item->period);
                $item->profit = $item->sales - $item->expenses;
                return $item;
            });

        $currentWeekStart = Carbon::now()->startOfWeek();
        $currentWeekEnd = Carbon::now()->endOfWeek();
        $currentWeekData = FakeData::whereBetween('date', [$currentWeekStart, $currentWeekEnd])->get();
        $thisWeekSales = $currentWeekData->sum('sales');
        $thisWeekExpenses = $currentWeekData->sum('expenses');
        $thisWeekOrders = $currentWeekData->sum('orders');
        $thisWeekProfit = $thisWeekSales - $thisWeekExpenses;

        $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $lastWeekData = FakeData::whereBetween('date', [$lastWeekStart, $lastWeekEnd])->get();
        $lastWeekSales = $lastWeekData->sum('sales');
        $lastWeekExpenses = $lastWeekData->sum('expenses');
        $lastWeekOrders = $lastWeekData->sum('orders');
        $lastWeekProfit = $lastWeekSales - $lastWeekExpenses;

        $totalSales = $chartdata->sum('sales');
        $totalProfit = $chartdata->sum('profit');
        $totalExpenses = $chartdata->sum('expenses');
        $totalOrders = $chartdata->sum('orders');

        $actionRoute = route('general.kuwago-one.dashboard');
        $totals = compact('totalSales', 'totalProfit', 'totalExpenses', 'totalOrders');
        $thisWeek = compact('thisWeekSales', 'thisWeekProfit', 'thisWeekExpenses', 'thisWeekOrders');
        $lastWeek = compact('lastWeekSales', 'lastWeekProfit', 'lastWeekExpenses', 'lastWeekOrders');

        return view('general.kuwago-one.dashboard', array_merge(
            compact('actionRoute', 'chartdata'), 
            $totals, 
            $thisWeek, 
            $lastWeek
        ));
    }
    // for /kuwago-one/sales
    public function chart_sales_kuwago_one(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeData::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                SUM(sales) as sales, SUM(gcash) as gcash, SUM(cash) as cash
            '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                $item->sales = $item->sales;
                $item->gcash = $item->gcash;
                $item->cash = $item->cash;
                return $item;
            });

        $actionRoute = route('general.kuwago-one.sales');
        $totalSales = $chartdata->sum('sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');
        return view('general.kuwago-one.sales', compact('chartdata', 'totalSales', 'totalGcash', 'totalCash', 'actionRoute'));
    }
    // for /kuwago-one/expenses
    public function chart_expenses_kuwago_one(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeData::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(
                '
                ' .
                    ($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) .
                    ' as period,
                SUM(expenses) as expenses
            '
            )
            ->groupBy('period')
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                $item->expenses = $item->expenses;
                return $item;
            });

        $actionRoute = route('general.kuwago-one.expenses');
        $totalExpenses = $chartdata->sum('expenses');

        return view('general.kuwago-one.expenses', compact('actionRoute', 'chartdata', 'totalExpenses'));
    }
    // for This method changes the format of the date for display purposes, ensuring the date is presented correctly based on the interval.
    private function formatDate($interval, $period)
    {
        if ($interval === 'overall') {
            return $period;
        }
    
        if ($interval === 'thisyear' || $interval === 'lastyear') {
            return Carbon::parse($period)->format('M'); // Three-letter month format
        }
    
        if (in_array($interval, ['today', 'yesterday', 'last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
            return Carbon::parse($period)->format('D'); // Three-letter day format
        }
    
        return Carbon::parse($period)->toDateString();
    }
    //This method filters the data by providing the start and end dates based on the selected interval.
    private function getDateRange($interval, $request)
    {
        switch ($interval) {
            case 'today':
                return ['start' => Carbon::now()->startOfDay(), 'end' => Carbon::now()->endOfDay()];
            case 'yesterday':
                return [
                    'start' => Carbon::now()
                        ->subDays(1)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'last3days':
                return [
                    'start' => Carbon::now()
                        ->subDays(3)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'last5days':
                return [
                    'start' => Carbon::now()
                        ->subDays(5)
                        ->startOfDay(),
                    'end' => Carbon::now()
                        ->subDays(1)
                        ->endOfDay(),
                ];
            case 'lastweek':
                return [
                    'start' => Carbon::now()
                        ->subWeek()
                        ->startOfWeek(),
                    'end' => Carbon::now()
                        ->subWeek()
                        ->endOfWeek(),
                ];
            case 'thisweek':
                return ['start' => Carbon::now()->startOfWeek(), 'end' => Carbon::now()->endOfWeek()];
            case 'thismonth':
                return ['start' => Carbon::now()->startOfMonth(), 'end' => Carbon::now()->endOfMonth()];
            case 'lastmonth':
                return [
                    'start' => Carbon::now()
                        ->subMonth()
                        ->startOfMonth(),
                    'end' => Carbon::now()
                        ->subMonth()
                        ->endOfMonth(),
                ];
            case 'thisyear':
                return ['start' => Carbon::now()->startOfYear(), 'end' => Carbon::now()->endOfYear()];
            case 'lastyear':
                return [
                    'start' => Carbon::now()
                        ->subYear()
                        ->startOfYear(),
                    'end' => Carbon::now()
                        ->subYear()
                        ->endOfYear(),
                ];
            case 'overall':
                return ['start' => Carbon::parse(FakeData::min('date')), 'end' => Carbon::parse(FakeData::max('date'))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }
}
