<?php

namespace App\Http\Controllers\Uddesign;

use App\Models\UddesignFeedback;
use App\Models\Deal;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Uddesign\UddesignOrderDetails;

class UddesignController extends Controller
{
    public function general_uddesign(Request $request)
    {
        $fields = [
            'total_sales', 'print_sales', 'merch_sales', 'custom_sales',
            'total_expenses', 'print_expenses', 'merch_expenses', 'custom_expenses'
        ];
        
        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $chartdata = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);
    
        $chartdata = $chartdata->map(function ($item) {
            $item->total_profit = $item->total_sales - $item->total_expenses;
            $item->print_profit = $item->print_sales - $item->print_expenses;
            $item->merch_profit = $item->merch_sales - $item->merch_expenses;
            $item->custom_profit = $item->custom_sales - $item->custom_expenses;
            return $item;
        });
    
        $totalPrintSales = $chartdata->sum('print_sales');
        $totalPrintProfit = $chartdata->sum('print_profit');
        $totalPrintExpenses = $chartdata->sum('print_expenses');
    
        $totalMerchSales = $chartdata->sum('merch_sales');
        $totalMerchProfit = $chartdata->sum('merch_profit');
        $totalMerchExpenses = $chartdata->sum('merch_expenses');
    
        $totalCustomSales = $chartdata->sum('custom_sales');
        $totalCustomProfit = $chartdata->sum('custom_profit');
        $totalCustomExpenses = $chartdata->sum('custom_expenses');
    
        $totalSales = $chartdata->sum('total_sales');
        $totalProfit = $chartdata->sum('total_profit');
        $totalExpenses = $chartdata->sum('total_expenses');
    
        $actionRoute = route('general.uddesign.dashboard');
        $totals = compact('totalSales', 'totalProfit', 'totalExpenses');
        $print = compact('totalPrintSales', 'totalPrintProfit', 'totalPrintExpenses');
        $merch = compact('totalMerchSales', 'totalMerchProfit', 'totalMerchExpenses');
        $custom = compact('totalCustomSales', 'totalCustomProfit', 'totalCustomExpenses');
    
        return view('general.uddesign.dashboard', array_merge(
            compact('actionRoute', 'chartdata'), 
            $totals,
            $print, 
            $merch, 
            $custom
        ));
    }

    public function chart_sales_uddesign(Request $request)
    {
        $fields = [
            'total_sales', 'print_sales', 'merch_sales', 'custom_sales',
            'gcash', 'cash'
        ];
        
        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $chartdata = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);
    
        $totalSales = $chartdata->sum('total_sales');
        $totalPrintSales = $chartdata->sum('print_sales');
        $totalMerchSales = $chartdata->sum('merch_sales');
        $totalCustomSales = $chartdata->sum('custom_sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');
    
        $actionRoute = route('general.uddesign.sales');
    
        return view('general.uddesign.sales', compact('chartdata', 'totalSales', 'totalPrintSales', 'totalMerchSales', 'totalCustomSales', 'totalGcash', 'totalCash', 'actionRoute'));
    }

    public function chart_expenses_uddesign(Request $request)
    {
        $fields = [
            'total_expenses', 'print_expenses', 'merch_expenses', 'custom_expenses'
        ];
        
        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $chartdata = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);

        $totalExpenses = $chartdata->sum('total_expenses');
        $totalPrintExpenses = $chartdata->sum('print_expenses');
        $totalMerchExpenses = $chartdata->sum('merch_expenses');
        $totalCustomExpenses = $chartdata->sum('custom_expenses');

        $actionRoute = route('general.uddesign.expenses');

        return view('general.uddesign.expenses', compact('actionRoute', 'chartdata', 'totalExpenses', 'totalPrintExpenses', 'totalMerchExpenses', 'totalCustomExpenses'));
    }


    private function generateChartData(Request $request, array $fields, $groupByField, $model)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);
        
        $selectFields = implode(', ', array_map(fn($field) => "SUM($field) as $field", $fields));
        $chartDataQuery = $model::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw("$groupByField as period, $selectFields")
            ->groupBy('period');

        $chartdata = $chartDataQuery->get()
            ->map(function ($item) use ($interval) {
                $item->date = $this->formatDate($interval, $item->period);
                return $item;
            });

        return $chartdata;
    }

    private function getGroupByField($interval)
    {
        return $interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date');
    }

    // This method changes the format of the date for display purposes, ensuring the date is presented correctly based on the interval.
    private function formatDate($interval, $period)
    {
        if ($interval === 'overall') {
            return $period;
        }

        if ($interval === 'thisyear' || $interval === 'lastyear') {
            return Carbon::parse($period)->format('F');
        }

        if (in_array($interval, ['today', 'yesterday', 'last3days', 'last5days', 'last7days', 'thisweek', 'lastweek'])) {
            return Carbon::parse($period)->format('l');
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
                return ['start' => Carbon::parse(UddesignReport::min('date')), 'end' => Carbon::parse(UddesignReport::max('date'))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }

    public function uddeals(Request $request)
    {
        $sort = $request->get('sort', 'newest');
        $deals = Deal::orderBy('created_at', $sort === 'newest' ? 'desc' : 'asc')->get();
    
        return view('general.uddesign.uddeals', compact('deals'));
    }

    public function showFeedbacks()
    {
        $feedback = UddesignFeedback::orderBy('feedback_date', 'desc')->get();
        $averageRating = $feedback->avg('rating');

        // Calculate the number of votes for each rating (1 to 5)
        $ratingCounts = [
            1 => $feedback->where('rating', 1)->count(),
            2 => $feedback->where('rating', 2)->count(),
            3 => $feedback->where('rating', 3)->count(),
            4 => $feedback->where('rating', 4)->count(),
            5 => $feedback->where('rating', 5)->count(),
        ];

        return view('general.uddesign.feedbacks', compact('feedback', 'averageRating', 'ratingCounts'));
    }

}
