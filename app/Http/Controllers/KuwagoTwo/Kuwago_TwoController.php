<?php

namespace App\Http\Controllers\KuwagoTwo;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KuwagoTwoReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Kuwago_TwoController extends Controller
{
    // Handles the dashboard view for /kuwago-two
    public function general_kuwago_two(Request $request)
    {
        return $this->generateChartData($request, 'general.kuwago-two.dashboard', ['sales', 'expenses', 'orders'], 'sales - expenses as profit');
    }

    // Handles the sales view for /kuwago-two/sales
    public function chart_sales_kuwago_two(Request $request)
    {
        return $this->generateChartData($request, 'general.kuwago-two.sales', ['sales', 'cash', 'gcash']);
    }

    // Handles the expenses view for /kuwago-two/expenses
    public function chart_expenses_kuwago_two(Request $request)
    {
        return $this->generateChartData($request, 'general.kuwago-two.expenses', ['expenses']);
    }

    // Changes the format of the date for display purposes, ensuring the date is presented correctly based on the interval
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

        return Carbon::parse($period)->toDateString(); // Default format (YYYY-MM-DD)
    }

    // Filters the data by providing the start and end dates based on the selected interval
    private function getDateRange($interval, $request)
    {
        switch ($interval) {
            case 'today':
                return ['start' => Carbon::now()->startOfDay(), 'end' => Carbon::now()->endOfDay()];
            case 'yesterday':
                return [
                    'start' => Carbon::now()->subDays(1)->startOfDay(),
                    'end' => Carbon::now()->subDays(1)->endOfDay(),
                ];
            case 'last3days':
                return [
                    'start' => Carbon::now()->subDays(3)->startOfDay(),
                    'end' => Carbon::now()->subDays(1)->endOfDay(),
                ];
            case 'last5days':
                return [
                    'start' => Carbon::now()->subDays(5)->startOfDay(),
                    'end' => Carbon::now()->subDays(1)->endOfDay(),
                ];
            case 'lastweek':
                return [
                    'start' => Carbon::now()->subWeek()->startOfWeek(),
                    'end' => Carbon::now()->subWeek()->endOfWeek(),
                ];
            case 'thisweek':
                return ['start' => Carbon::now()->startOfWeek(), 'end' => Carbon::now()->endOfWeek()];
            case 'thismonth':
                return ['start' => Carbon::now()->startOfMonth(), 'end' => Carbon::now()->endOfMonth()];
            case 'lastmonth':
                return [
                    'start' => Carbon::now()->subMonth()->startOfMonth(),
                    'end' => Carbon::now()->subMonth()->endOfMonth(),
                ];
            case 'thisyear':
                return ['start' => Carbon::now()->startOfYear(), 'end' => Carbon::now()->endOfYear()];
            case 'lastyear':
                return [
                    'start' => Carbon::now()->subYear()->startOfYear(),
                    'end' => Carbon::now()->subYear()->endOfYear(),
                ];
            case 'overall':
                return ['start' => Carbon::parse(KuwagoTwoReport::min('date')), 'end' => Carbon::parse(KuwagoTwoReport::max('date'))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }

    // Generates a date range based on the start and end dates, taking into account the interval
    private function generateDateRange($start, $end, $interval)
    {
        $dates = [];
        $current = Carbon::parse($start);

        if ($interval === 'thisyear' || $interval === 'lastyear') {
            while ($current->lte(Carbon::parse($end))) {
                $dates[] = $current->format('Y-m'); // Generate month intervals
                $current->addMonth();
            }
        } else {
            while ($current->lte(Carbon::parse($end))) {
                $dates[] = $current->copy(); // Ensure you are working with Carbon objects
                $current->addDay();
            }
        }

        return $dates;
    }

    // Main method to fetch and aggregate chart data based on the provided fields and interval
    private function generateChartData(Request $request, $view, array $fields, $extraSelect = '')
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);
        $selectFields = implode(', ', array_map(fn($field) => "SUM($field) as $field", $fields));

        // Fetch and aggregate chart data
        $chartdata = KuwagoTwoReport::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw(($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')) . " as period, $selectFields")
            ->groupBy(DB::raw($interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date')))
            ->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                return $item;
            });

        // Ensure aggregation of overall data into one period
        if ($interval === 'overall') {
            $chartdata = $chartdata->reduce(function ($carry, $item) use ($fields) {
                if (is_null($carry)) {
                    return $item;
                }
                foreach ($fields as $field) {
                    $carry->$field += $item->$field;
                }
                return $carry;
            }, null);

            $chartdata = collect([$chartdata]);
        } else {
            // Generate all dates within the interval
            $allDates = $this->generateDateRange($dates['start'], $dates['end'], $interval);

            // Combine all dates with chart data, ensuring all dates are represented
            $chartdata = collect($allDates)->map(function ($date) use ($chartdata, $interval, $fields) {
                $formattedDate = $this->formatDate($interval, $date);
                $data = $chartdata->firstWhere('date', $formattedDate);

                $item = ['date' => $formattedDate];
                foreach ($fields as $field) {
                    $item[$field] = $data ? $data->$field : 0;
                }
                return (object) $item;
            });
        }

        // Calculate totals and profit
        $totals = [];
        foreach ($fields as $field) {
            $totals["total" . ucfirst($field)] = $chartdata->sum($field);
        }

        // Calculate profit if both sales and expenses fields are present
        if (in_array('sales', $fields) && in_array('expenses', $fields)) {
            $chartdata->each(function ($item) {
                $item->profit = $item->sales - $item->expenses;
            });
            $totals['totalProfit'] = $chartdata->sum('profit');
        }

        $actionRoute = route($view);
        $thisWeek = $this->getCurrentWeekData();
        $lastWeek = $this->getLastWeekData();
        $thisMonth = $this->getCurrentMonthData();
        $lastMonth = $this->getLastMonthData();
        $thisYear = $this->getCurrentYearData();
        $lastYear = $this->getLastYearData();

        return view($view, array_merge(compact('actionRoute', 'chartdata'), $totals, $thisWeek, $lastWeek, $thisMonth, $lastMonth, $thisYear, $lastYear));
    }

    // Gets the current week's data for sales, expenses, orders, and profit
    private function getCurrentWeekData()
    {
        $currentWeekData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        return [
            'thisWeekSales' => $currentWeekData->sum('sales'),
            'thisWeekExpenses' => $currentWeekData->sum('expenses'),
            'thisWeekOrders' => $currentWeekData->sum('orders'),
            'thisWeekProfit' => $currentWeekData->sum('sales') - $currentWeekData->sum('expenses'),
        ];
    }

    // Gets the last week's data for sales, expenses, orders, and profit
    private function getLastWeekData()
    {
        $lastWeekData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->subWeek()->startOfWeek(),Carbon::now()->subWeek()->endOfWeek(),])->get();
        return [
            'lastWeekSales' => $lastWeekData->sum('sales'),
            'lastWeekExpenses' => $lastWeekData->sum('expenses'),
            'lastWeekOrders' => $lastWeekData->sum('orders'),
            'lastWeekProfit' => $lastWeekData->sum('sales') - $lastWeekData->sum('expenses'),
        ];
    }
    // Gets the current week's data for sales, expenses, orders, and profit
    private function getCurrentMonthData()
    {
        $currentMonthData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();
        return [
            'thisMonthSales' => $currentMonthData->sum('sales'),
            'thisMonthExpenses' => $currentMonthData->sum('expenses'),
            'thisMonthOrders' => $currentMonthData->sum('orders'),
            'thisMonthProfit' => $currentMonthData->sum('sales') - $currentMonthData->sum('expenses'),
        ];
    }

    // Gets the last week's data for sales, expenses, orders, and profit
    private function getLastMonthData()
    {
        $lastMonthData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->subMonth()->startOfMonth(),Carbon::now()->subMonth()->endOfMonth(),])->get();
        return [
            'lastMonthSales' => $lastMonthData->sum('sales'),
            'lastMonthExpenses' => $lastMonthData->sum('expenses'),
            'lastMonthOrders' => $lastMonthData->sum('orders'),
            'lastMonthProfit' => $lastMonthData->sum('sales') - $lastMonthData->sum('expenses'),
        ];
    }
    // Gets the current week's data for sales, expenses, orders, and profit
    private function getCurrentYearData()
    {
        $currentYearData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->get();
        return [
            'thisYearSales' => $currentYearData->sum('sales'),
            'thisYearExpenses' => $currentYearData->sum('expenses'),
            'thisYearOrders' => $currentYearData->sum('orders'),
            'thisYearProfit' => $currentYearData->sum('sales') - $currentYearData->sum('expenses'),
        ];
    }

    // Gets the last week's data for sales, expenses, orders, and profit
    private function getLastYearData()
    {
        $lastYearData = KuwagoTwoReport::whereBetween('date', [Carbon::now()->subYear()->startOfYear(),Carbon::now()->subYear()->endOfYear(),])->get();
        return [
            'lastYearSales' => $lastYearData->sum('sales'),
            'lastYearExpenses' => $lastYearData->sum('expenses'),
            'lastYearOrders' => $lastYearData->sum('orders'),
            'lastYearProfit' => $lastYearData->sum('sales') - $lastYearData->sum('expenses'),
        ];
    }
}
