<?php

namespace App\Http\Controllers\Uddesign;

use App\Models\Deal;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use App\Models\UddesignFeedback;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Uddesign\UddesignMerchDetail;
use App\Models\Uddesign\UddesignPrintDetail;
use App\Models\Uddesign\UddesignExpenseDetail;

class UddesignController extends Controller
{
    // Handles the dashboard view for /uddesign
    public function general_uddesign(Request $request)
    {
        $fields = ['total_sales', 'print_sales', 'merch_sales', 'custom_sales', 'total_expenses', 'print_expenses', 'merch_expenses', 'custom_expenses'];

        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $data = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);

        $chartdata = $data['chartdata'];

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

        return view('general.uddesign.dashboard', array_merge(compact('actionRoute', 'chartdata'), $totals, $print, $merch, $custom));
    }

    // Handles the sales view for /kuwago-two/sales
    public function chart_sales_uddesign(Request $request)
    {
        $fields = ['total_sales', 'print_sales', 'merch_sales', 'custom_sales', 'gcash', 'cash'];

        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $data = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);

        $chartdata = $data['chartdata'];
        $printCategoryData = $data['printCategoryData'];
        $chartCategoryData = $data['chartCategoryData'];
        $topMerches = $data['topMerches'];

        $totalSales = $chartdata->sum('total_sales');
        $totalPrintSales = $chartdata->sum('print_sales');
        $totalMerchSales = $chartdata->sum('merch_sales');
        $totalCustomSales = $chartdata->sum('custom_sales');
        $totalGcash = $chartdata->sum('gcash');
        $totalCash = $chartdata->sum('cash');

        $actionRoute = route('general.uddesign.sales');

        return view('general.uddesign.sales', compact('chartdata', 'totalSales', 'totalPrintSales', 'totalMerchSales', 'totalCustomSales', 'totalGcash', 'totalCash', 'actionRoute', 'printCategoryData', 'chartCategoryData', 'topMerches'));
    }

    // Handles the expenses view for /kuwago-two/expenses
    public function chart_expenses_uddesign(Request $request)
    {
        $fields = ['total_expenses', 'print_expenses', 'merch_expenses', 'custom_expenses'];

        $interval = $request->input('interval', 'thisweek');
        $groupByField = $this->getGroupByField($interval);
        $data = $this->generateChartData($request, $fields, $groupByField, UddesignReport::class);

        $chartdata = $data['chartdata'];
        $chartExpenseData = $data['chartExpenseData'];
        $expenseData = $data['expenseData'];
        $totalExpenseAmount = $data['totalExpenseAmount'];
        // dd($expenseData);
        $totalExpenses = $chartdata->sum('total_expenses');
        $totalPrintExpenses = $chartdata->sum('print_expenses');
        $totalMerchExpenses = $chartdata->sum('merch_expenses');
        $totalCustomExpenses = $chartdata->sum('custom_expenses');

        $actionRoute = route('general.uddesign.expenses');

        return view('general.uddesign.expenses', compact('actionRoute', 'chartdata', 'totalExpenses', 'totalPrintExpenses', 'totalMerchExpenses', 'totalCustomExpenses', 'chartExpenseData', 'expenseData', 'totalExpenseAmount'));
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

    private function generateChartData(Request $request, array $fields, $groupByField, $model)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);

        $selectFields = implode(', ', array_map(fn($field) => "SUM($field) as $field", $fields));
        $chartDataQuery = $model
            ::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw("$groupByField as period, $selectFields")
            ->groupBy('period');

        $chartdata = $chartDataQuery->get()->map(function ($item) use ($interval) {
            $item->date = $this->formatDate($interval, $item->period);
            return $item;
        });

        // Fetch and aggregate chart data by category for order details
        $printCategoryData = UddesignPrintDetail::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('uddesign_print_types', 'uddesign_print_details.print_type_id', '=', 'uddesign_print_types.print_type_id')
            ->join('uddesign_print_categories', 'uddesign_print_types.print_category_id', '=', 'uddesign_print_categories.print_category_id')
            ->selectRaw('uddesign_print_categories.name as printcategory, SUM(uddesign_print_details.pcs) as total_pcs')
            ->groupBy('uddesign_print_categories.name')
            ->get();

        // Fetch and aggregate chart data by category for order details
        $chartCategoryData = UddesignMerchDetail::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('uddesign_merch_types', 'uddesign_merch_details.merch_type_id', '=', 'uddesign_merch_types.merch_type_id')
            ->join('uddesign_merch_categories', 'uddesign_merch_types.merch_category_id', '=', 'uddesign_merch_categories.merch_category_id')
            ->selectRaw('uddesign_merch_categories.name as merchcategory, SUM(uddesign_merch_details.pcs) as total_pcs')
            ->groupBy('uddesign_merch_categories.name')
            ->get();

        // Fetch and aggregate data for merches
        $merchData = UddesignMerchDetail::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('uddesign_merch_types', 'uddesign_merch_details.merch_type_id', '=', 'uddesign_merch_types.merch_type_id')
            ->selectRaw('uddesign_merch_types.name as merch, SUM(uddesign_merch_details.pcs) as total_pcs')
            ->groupBy('uddesign_merch_types.name')
            ->get();

        // Get the top 5 most sold merches
        $topMerches = $merchData->sortByDesc('total_pcs')->take(5);


        $chartExpenseData = UddesignExpenseDetail::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('uddesign_expense_types', 'uddesign_expense_details.expense_type_id', '=', 'uddesign_expense_types.expense_type_id')
            ->join('uddesign_expense_categories', 'uddesign_expense_types.expense_category_id', '=', 'uddesign_expense_categories.expense_category_id')
            ->selectRaw('uddesign_expense_categories.name as expenseCategory, SUM(uddesign_expense_details.price) as total_amount')
            ->groupBy('uddesign_expense_categories.name')
            ->get();

        $expenseData = UddesignExpenseDetail::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('uddesign_expense_types', 'uddesign_expense_details.expense_type_id', '=', 'uddesign_expense_types.expense_type_id')
            ->selectRaw('uddesign_expense_types.name as expenseType, uddesign_expense_details.price')
            ->groupBy('uddesign_expense_types.name', 'uddesign_expense_details.price')
            ->get();
    
        // Calculate total of the amount
        $totalExpenseAmount = $expenseData->sum('price');


        return [
            'chartdata' => $chartdata,
            'printCategoryData' => $printCategoryData,
            'chartCategoryData' => $chartCategoryData,
            'topMerches' => $topMerches,
            'chartExpenseData' => $chartExpenseData,
            'expenseData' => $expenseData,
            'totalExpenseAmount' => $totalExpenseAmount,
        ];
    }


    private function getGroupByField($interval)
    {
        return $interval === 'overall' ? 'YEAR(date)' : ($interval === 'thisyear' || $interval === 'lastyear' ? 'DATE_FORMAT(date, "%Y-%m")' : 'date');
    }

    public function uddeals(Request $request)
    {
        $sort = $request->get('sort', 'newest');
        $deals = Deal::orderBy('created_at', $sort === 'newest' ? 'desc' : 'asc')->get();

        return view('general.uddesign.uddeals', compact('deals'));
    }

    public function showFeedbacks(Request $request)
    {
        return $this->generateFeedbackData($request, 'general.uddesign.feedbacks');
    }

    private function generateFeedbackData(Request $request, $view)
    {
        $interval = $request->input('interval', 'thisweek');
        $dates = $this->getDateRange($interval, $request);
    
        // Fetch feedback data
        $feedback = UddesignFeedback::whereBetween('feedback_date', [$dates['start'], $dates['end']])->get();
    
        $averageRating = $feedback->avg('rating');
    
        $ratingCounts = [
            1 => $feedback->where('rating', 1)->count(),
            2 => $feedback->where('rating', 2)->count(),
            3 => $feedback->where('rating', 3)->count(),
            4 => $feedback->where('rating', 4)->count(),
            5 => $feedback->where('rating', 5)->count(),
        ];
    
        $comments = $feedback->where('feedback_type', 'Comment')->values();
        $suggestions = $feedback->where('feedback_type', 'Suggestion')->values();
        $complaints = $feedback->where('feedback_type', 'Complaint')->values();
    
        $actionRoute = route($view);
    
        return view($view, compact('actionRoute', 'feedback', 'averageRating', 'ratingCounts', 'comments', 'suggestions', 'complaints'));
    }
}
