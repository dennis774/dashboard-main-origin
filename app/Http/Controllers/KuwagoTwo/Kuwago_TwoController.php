<?php

namespace App\Http\Controllers\KuwagoTwo;

use App\Models\Promo;
use App\Models\FakeDataTwo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Kuwago_TwoController extends Controller
{
    // for /kuwago-two
    public function general_kuwago_two(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeDataTwo::whereBetween('date', [$dates['start'], $dates['end']])
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
        $currentWeekData = FakeDataTwo::whereBetween('date', [$currentWeekStart, $currentWeekEnd])->get();
        $thisWeekSales = $currentWeekData->sum('sales');
        $thisWeekExpenses = $currentWeekData->sum('expenses');
        $thisWeekOrders = $currentWeekData->sum('orders');
        $thisWeekProfit = $thisWeekSales - $thisWeekExpenses;

        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();
        $currentMonthData = FakeDataTwo::whereBetween('date', [$currentMonthStart, $currentMonthEnd])->get();
        $thisMonthSales = $currentMonthData->sum('sales');
        $thisMonthExpenses = $currentMonthData->sum('expenses');
        $thisMonthOrders = $currentMonthData->sum('orders');
        $thisMonthProfit = $thisMonthSales - $thisMonthExpenses;

        $currentYearStart = Carbon::now()->startOfYear();
        $currentYearEnd = Carbon::now()->endOfYear();
        $currentYearData = FakeDataTwo::whereBetween('date', [$currentYearStart, $currentYearEnd])->get();
        $thisYearSales = $currentYearData->sum('sales');
        $thisYearExpenses = $currentYearData->sum('expenses');
        $thisYearOrders = $currentYearData->sum('orders');
        $thisYearProfit = $thisYearSales - $thisYearExpenses;

        $lastWeekStart = Carbon::now()->subWeek()->startOfWeek();
        $lastWeekEnd = Carbon::now()->subWeek()->endOfWeek();
        $lastWeekData = FakeDataTwo::whereBetween('date', [$lastWeekStart, $lastWeekEnd])->get();
        $lastWeekSales = $lastWeekData->sum('sales');
        $lastWeekExpenses = $lastWeekData->sum('expenses');
        $lastWeekOrders = $lastWeekData->sum('orders');
        $lastWeekProfit = $lastWeekSales - $lastWeekExpenses;

        $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
        $lastMonthData = FakeDataTwo::whereBetween('date', [$lastMonthStart, $lastMonthEnd])->get();
        $lastMonthSales = $lastMonthData->sum('sales');
        $lastMonthExpenses = $lastMonthData->sum('expenses');
        $lastMonthOrders = $lastMonthData->sum('orders');
        $lastMonthProfit = $lastMonthSales - $lastMonthExpenses;

        $lastYearStart = Carbon::now()->subYear()->startOfYear();
        $lastYearEnd = Carbon::now()->subYear()->endOfYear();
        $lastYearData = FakeDataTwo::whereBetween('date', [$lastYearStart, $lastYearEnd])->get();
        $lastYearSales = $lastYearData->sum('sales');
        $lastYearExpenses = $lastYearData->sum('expenses');
        $lastYearOrders = $lastYearData->sum('orders');
        $lastYearProfit = $lastYearSales - $lastYearExpenses;

        $totalSales = $chartdata->sum('sales');
        $totalProfit = $chartdata->sum('profit');
        $totalExpenses = $chartdata->sum('expenses');
        $totalOrders = $chartdata->sum('orders');

        $actionRoute = route('general.kuwago-two.dashboard');
        $totals = compact('totalSales', 'totalProfit', 'totalExpenses', 'totalOrders');
        $thisWeek = compact('thisWeekSales', 'thisWeekProfit', 'thisWeekExpenses', 'thisWeekOrders');
        $lastWeek = compact('lastWeekSales', 'lastWeekProfit', 'lastWeekExpenses', 'lastWeekOrders');

        $thisMonth = compact('thisMonthSales', 'thisMonthProfit', 'thisMonthExpenses', 'thisMonthOrders');
        $lastMonth = compact('lastMonthSales', 'lastMonthProfit', 'lastMonthExpenses', 'lastMonthOrders');

        $thisYear = compact('thisYearSales', 'thisYearProfit', 'thisYearExpenses', 'thisYearOrders');
        $lastYear = compact('lastYearSales', 'lastYearProfit', 'lastYearExpenses', 'lastYearOrders');

        return view('general.kuwago-two.dashboard', array_merge(
            compact('actionRoute', 'chartdata'), 
            $totals, 
            $thisWeek, 
            $lastWeek,
            $thisMonth, 
            $lastMonth,
            $thisYear, 
            $lastYear
        ));
    }
    // for /kuwago-two/sales
    public function chart_sales_kuwago_two(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeDataTwo::whereBetween('date', [$dates['start'], $dates['end']])
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

        $actionRoute = route('general.kuwago-two.sales');
        $totalSales = $chartdata->sum('sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');
        return view('general.kuwago-two.sales', compact('chartdata', 'totalSales', 'totalGcash', 'totalCash', 'actionRoute'));
    }
    // for /kuwago-two/expenses
    public function chart_expenses_kuwago_two(Request $request)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $chartdata = FakeDataTwo::whereBetween('date', [$dates['start'], $dates['end']])
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

        $actionRoute = route('general.kuwago-two.expenses');
        $totalExpenses = $chartdata->sum('expenses');

        return view('general.kuwago-two.expenses', compact('actionRoute', 'chartdata', 'totalExpenses'));
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
                return ['start' => Carbon::parse(FakeDataTwo::min('date')), 'end' => Carbon::parse(FakeDataTwo::max('date'))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }


}
