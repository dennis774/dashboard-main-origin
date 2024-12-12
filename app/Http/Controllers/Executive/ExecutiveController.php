<?php

namespace App\Http\Controllers\Executive;

use App\Models\Deal;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use App\Models\KuwagoOneReport;
use App\Models\KuwagoTwoReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\KuwagoOne\KuwagoOneOrderDetails;
use App\Models\KuwagoTwo\KuwagoTwoOrderDetails;

class ExecutiveController extends Controller
{
    public function weather()
    {
        return view('general.executive.weather');
    }


    public function combinedDashboard(Request $request)
    {
        // Define the fields for Uddesign and Kuwago Two
        $uddesignFields = [
            'total_sales', 'print_sales', 'merch_sales', 'custom_sales', 
            'total_expenses', 'print_expenses', 'merch_expenses', 'custom_expenses'
        ];

        $kuwagoTwoFields = ['sales', 'expenses', 'orders'];
        $kuwagoOneFields = ['sales', 'expenses', 'orders'];

        // Get the interval
        $interval = str_replace('_', '', $request->input('interval', 'thisweek'));

        // Fetch aggregated Uddesign data
        $uddesignData = $this->generateUddesignData($request, $uddesignFields, UddesignReport::class);
        
        // Fetch aggregated Kuwago Two data
        $kuwagoTwoData = $this->generateChartData($request, $kuwagoTwoFields, KuwagoTwoReport::class);

        // Fetch aggregated Kuwago One data
        $kuwagoOneData = $this->generateChartData($request, $kuwagoOneFields, KuwagoOneReport::class);

        // Combine totals
        $totalSales = $uddesignData->total_sales + $kuwagoTwoData['totals']->sales + $kuwagoOneData['totals']->sales;
        $totalExpenses = $uddesignData->total_expenses + $kuwagoTwoData['totals']->expenses + $kuwagoOneData['totals']->expenses;
        $totalProfit = $uddesignData->total_profit + $kuwagoTwoData['totals']->total_profit + $kuwagoOneData['totals']->total_profit;

        $actionRoute = route('general.executive.dashboard');
        $totals = compact('totalSales', 'totalExpenses', 'totalProfit');

        // Fetch deal data
        $dealData = $this->generateDealData($request, Deal::class);

        // Separate data for chart
        $chartData = [
            'Uddesign' => [
                'sales' => $uddesignData->total_sales,
                'expenses' => $uddesignData->total_expenses,
                'profit' => $uddesignData->total_profit,
            ],
            'Kuwago1' => [
                'sales' => $kuwagoOneData['totals']->sales,
                'expenses' => $kuwagoOneData['totals']->expenses,
                'profit' => $kuwagoOneData['totals']->total_profit,
                'topDishes1' => $kuwagoOneData['topDishes1']
            ],
            'Kuwago2' => [
                'sales' => $kuwagoTwoData['totals']->sales,
                'expenses' => $kuwagoTwoData['totals']->expenses,
                'profit' => $kuwagoTwoData['totals']->total_profit,
                'topDishes2' => $kuwagoTwoData['topDishes2']
            ]
        ];

        return view('general.executive.dashboard', compact('actionRoute', 'totals', 'dealData', 'chartData'));
    }


    private function getDateRange($interval, $request, $modelClass, $dateField)
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
                return ['start' => Carbon::parse($modelClass::min($dateField)), 'end' => Carbon::parse($modelClass::max($dateField))];
            case 'custom':
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
            default:
                return ['start' => Carbon::parse($request->input('start_date')), 'end' => Carbon::parse($request->input('end_date'))];
        }
    }

    private function generateUddesignData(Request $request, array $fields, $model)
    {
        $interval = str_replace('_', '', $request->input('interval', 'thisweek'));
        $dates = $this->getDateRange($interval, $request, $model, 'date');

        $selectFields = implode(', ', array_map(fn($field) => "SUM($field) as $field", $fields));

        // Query to aggregate all data
        $totals = $model::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw($selectFields)
            ->first();

        // Calculate profit
        $totals->total_profit = $totals->total_sales - $totals->total_expenses;

        return $totals;
    }

    private function generateDealData(Request $request, $model)
    {
        $interval = str_replace('_', '', $request->input('interval', 'thisweek'));
        $dates = $this->getDateRange($interval, $request, $model, 'created_at');
    
        $allStatuses = ['Open', 'Processing', 'Closed', 'On-Hold', 'Cancelled'];
        $statusCounts = $model::whereBetween('created_at', [$dates['start'], $dates['end']])
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
    
        $data = [];
        foreach ($allStatuses as $status) {
            $count = isset($statusCounts[$status]) ? $statusCounts[$status] : 0;
            $formattedCount = str_pad($count, 2, '0', STR_PAD_LEFT);
            $data[] = (object)[
                'status' => $status,
                'count' => $formattedCount
            ];
        }
    
        return collect($data);
    }

    private function generateChartData(Request $request, array $fields, $model)
    {
        $interval = str_replace('_', '', $request->input('interval', 'thisweek'));
        $dates = $this->getDateRange($interval, $request, $model, 'date');

        $selectFields = implode(', ', array_map(fn($field) => "SUM($field) as $field", $fields));

        // Query to aggregate all data
        $totals = $model::whereBetween('date', [$dates['start'], $dates['end']])
            ->selectRaw($selectFields)
            ->first();

        // Calculate profit
        $totals->total_profit = $totals->sales - $totals->expenses;

        // Fetch top 5 dishes for Kuwago Two
        $dishData2 = KuwagoTwoOrderDetails::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('kuwago_two_dishes', 'kuwago_two_order_details.dish_id', '=', 'kuwago_two_dishes.id')
            ->selectRaw('kuwago_two_dishes.name as dish, SUM(kuwago_two_order_details.pcs) as total_pcs')
            ->groupBy('kuwago_two_dishes.name')
            ->orderByDesc('total_pcs')
            ->get();

        $dishData1 = KuwagoOneOrderDetails::whereBetween('date', [$dates['start'], $dates['end']])
            ->join('kuwago_one_dishes', 'kuwago_one_order_details.dish_id', '=', 'kuwago_one_dishes.id')
            ->selectRaw('kuwago_one_dishes.name as dish, SUM(kuwago_one_order_details.pcs) as total_pcs')
            ->groupBy('kuwago_one_dishes.name')
            ->orderByDesc('total_pcs')
            ->get();
            // dd($dishData2->values(), $dishData1->values());
        return [
            'totals' => $totals,
            'topDishes1' => $dishData1,
            'topDishes2' => $dishData2
        ];
    }


    
}

