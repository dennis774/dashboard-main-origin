<?php

namespace App\Http\Controllers\Executive;

use Exception;
use App\Models\Deal;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use App\Models\KuwagoOneReport;
use App\Models\KuwagoTwoReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\KuwagoOne\KuwagoOneOrder;
use App\Models\KuwagoOne\KuwagoOneOrderDetails;
use App\Models\KuwagoTwo\KuwagoTwoOrderDetails;

class ExecutiveController extends Controller
{
    private function translateWeatherCode($code)
    {
        $wmoCodes = [
            0 => "Clear sky",
            1 => "Mainly clear",
            2 => "Partly cloudy",
            3 => "Overcast",
            45 => "Fog",
            48 => "Depositing rime fog",
            51 => "Drizzle: Light",
            53 => "Drizzle: Moderate",
            55 => "Drizzle: Dense",
            61 => "Rain: Slight",
            63 => "Rain: Moderate",
            65 => "Rain: Heavy",
            71 => "Snowfall: Slight",
            73 => "Snowfall: Moderate",
            75 => "Snowfall: Heavy",
            80 => "Rain showers: Slight",
            81 => "Rain showers: Moderate",
            82 => "Rain showers: Violent",
            95 => "Thunderstorm: Slight or Moderate",
            96 => "Thunderstorm with slight hail",
            99 => "Thunderstorm with heavy hail",
        ];
    
        return $wmoCodes[$code] ?? "Unknown weather code";
    }

    private function simpleTranslateWeatherCode($code)
    {
        $wmoCodes = [
            0 => "Clear",
            1 => "Clear",
            2 => "Cloudy",
            3 => "Overcast",
            45 => "Fog",
            48 => "Fog",
            51 => "Drizzle",
            53 => "Drizzle",
            55 => "Drizzle",
            61 => "Rain",
            63 => "Rain",
            65 => "Rain",
            71 => "Snowfall",
            73 => "Snowfall",
            75 => "Snowfall",
            80 => "Rain showers",
            81 => "Rain showers",
            82 => "Rain showers",
            95 => "Thunderstorm",
            96 => "Thunderstorm",
            99 => "Thunderstorm",
        ];
    
        return $wmoCodes[$code] ?? "Unknown weather code";
    }

    public function weather()
    {
        $api_key = env("API_KEY_WEATHER");

        $timezone = 'Asia/Manila';
        $date = Carbon::now($timezone)->format("l, F d");
        $time = Carbon::now($timezone)->format("h:i A");

        $url = "https://api.open-meteo.com/v1/forecast?latitude=16.1&longitude=120.5167&current=temperature_2m,is_day,rain,cloud_cover,wind_speed_10m&daily=weather_code,temperature_2m_max,temperature_2m_min,apparent_temperature_max,apparent_temperature_min,precipitation_probability_max,wind_speed_10m_max&timezone=Asia%2FSingapore&forecast_days=14";
        $response = Http::get($url);
        $jsonData = [];
        $forecastDate = [];
        $weatherDescription = [];
        $simpleWeatherDescription = [];

        if($response->successful()){
            $jsonData = $response->json();

            for ($i = 0; $i < count($jsonData["daily"]["time"]); $i++){
                $carbonDate = Carbon::parse($jsonData["daily"]["time"][$i]);
                $formattedDate = $carbonDate->format('l, F j');
                $forecastDate[] = $formattedDate;
                $weatherDescription[] = $this->translateWeatherCode($jsonData["daily"]["weather_code"][$i]);
                $simpleWeatherDescription[] = $this->simpleTranslateWeatherCode($jsonData["daily"]["weather_code"][$i]);
            }

        }else{
            $jsonData = "Fail";
        }

        return view('general.executive.weather', compact('jsonData', 'date', 'time', 'forecastDate', 'weatherDescription', 'simpleWeatherDescription'));
    }


    public function combinedDashboard(Request $request)
    {
        $prediction_data[0]['Number of Sales Prediction'] = 0;
        $prediction_data[0]['Total Sales Prediction'] = 0;
        $prediction_data[0]['Total Expenses Prediction'] = 0;
        $prediction_data[0]['Total Profit Prediction'] = 0;

        try{
            $kwago_url = 'http://127.0.0.1:8080/kwago_predict';
            $weather_url = 'http://127.0.0.1:8080/weather_predict';
        
            $kwago_response = Http::get($kwago_url);
            $weather_response = Http::get($weather_url);

            if($kwago_response->successful() && $weather_response->successful()){
                $prediction_data = $kwago_response->json();
                $weather_data = $weather_response->json();
            }
        }catch (Exception $th) {}

        $timezone = 'Asia/Manila';
        $date = Carbon::now($timezone)->format("l, F d");
        $time = Carbon::now($timezone)->format("h:i A");

        $url = "https://api.open-meteo.com/v1/forecast?latitude=16.1&longitude=120.5167&current=temperature_2m,is_day,rain,cloud_cover,wind_speed_10m&daily=weather_code,temperature_2m_max,temperature_2m_min,apparent_temperature_max,apparent_temperature_min,precipitation_probability_max,wind_speed_10m_max&timezone=Asia%2FSingapore&forecast_days=14";
        
        $response = Http::get($url);
        $jsonData = [];

        if($response->successful()){
            $jsonData = $response->json();
        }

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
                'topDishes1' => $kuwagoOneData['topDishes1'],
                'ordersCount' => $kuwagoOneData['ordersCount'],
            ],
            'Kuwago2' => [
                'sales' => $kuwagoTwoData['totals']->sales,
                'expenses' => $kuwagoTwoData['totals']->expenses,
                'profit' => $kuwagoTwoData['totals']->total_profit,
                'topDishes2' => $kuwagoTwoData['topDishes2']
            ]
        ];

        return view('general.executive.dashboard', compact('actionRoute', 'totals', 'dealData', 'chartData', 'jsonData', 'date', 'time', 'prediction_data'));
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

        $ordersCount = KuwagoOneOrder::whereBetween('date', [$dates['start'], $dates['end']])
            ->distinct('order_id')->count('order_id');
        
        return [
            'totals' => $totals,
            'topDishes1' => $dishData1,
            'topDishes2' => $dishData2,
            'ordersCount' => $ordersCount
        ];
    }


    
}

