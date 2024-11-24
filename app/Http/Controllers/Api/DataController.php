<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use App\Models\ChartData;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    // public function refreshData() 
    // {
    //     $client = new Client();
    //     $response = $client->request('GET', env('MY_API_URL', '').'/api/data');
    //     $body_contents = json_decode($response->getBody()->getContents());
    //     // dd($body_contents);

    //     ChartData::truncate();
    //     $array_of_data = [];

    //     foreach ($body_contents->data as $content) {
    //         // dd($content);
    //         array_push($array_of_data, [
    //             'cash' => $content->cash,
    //             'gcash' => $content->gcash,
    //             'total_remittance' => $content->total_remittance,
    //             'date' => $content->date,
    //         ]);
    //     }
    //     ChartData::insert($array_of_data);

    //     // return response()->json([
    //     //     'succesful' => true,
    //     //     'data' => $array_of_data
    //     // ]);
    //     return redirect()->back()->with('success', 'Data refreshed successfully!');
    // }

    // public function refreshData() 
    // {
    //     // $token = 'Gl2ntHPD0FSvV3Q3en5d0oedvyxM4nM2ypBoC7FH5ba82c2a';
    //     $client = new Client();
    //     $response = $client->request('GET', env('MY_API_URL', '').'/api/data');
    //     $body_contents = json_decode($response->getBody()->getContents());
    //     // dd($body_contents);

    //     UddesignReport::truncate();
    //     $array_of_data = [];

    //     foreach ($body_contents->data as $content) {
    //         // dd($content);
    //         array_push($array_of_data, [
    //             'cash' => $content->cash,
    //             'gcash' => $content->gcash,
    //             'print_sales' => $content->print_sales,
    //             'merch_sales' => $content->merch_sales,
    //             'custom_sales' => $content->custom_sales,
    //             'total_sales' => $content->total_sales,
    //             'print_expenses' => $content->print_expenses,
    //             'merch_expenses' => $content->merch_expenses,
    //             'custom_expenses' => $content->custom_expenses,
    //             'total_expenses' => $content->total_expenses,
    //             'date' => $content->date,
    //         ]);
    //     }
    //     UddesignReport::insert($array_of_data);

    //     return response()->json([
    //         'succesful' => true,
    //         // 'data' => $data
    //     ]);
    //     return redirect()->back()->with('success', 'Data refreshed successfully!');
    // }

    // public function refreshData() 
    // {
    //     session(['uddesign_api_token']);
    //     // Make the GET request using the Http facade
    //     $response = Http::withToken('uddesign_api_token')->request('GET', env('MY_API_URL', '').'/api/data');
    
    //     if ($response->successful()) {
    //         $body_contents = $response->json();
    
    //         // Truncate the existing table data
    //         UddesignReport::truncate();
    
    //         // Prepare the data array
    //         $array_of_data = [];
    
    //         foreach ($body_contents['data'] as $content) {
    //             $array_of_data[] = [
    //                 'cash' => $content['cash'],
    //                 'gcash' => $content['gcash'],
    //                 'print_sales' => $content['print_sales'],
    //                 'merch_sales' => $content['merch_sales'],
    //                 'custom_sales' => $content['custom_sales'],
    //                 'total_sales' => $content['total_sales'],
    //                 'print_expenses' => $content['print_expenses'],
    //                 'merch_expenses' => $content['merch_expenses'],
    //                 'custom_expenses' => $content['custom_expenses'],
    //                 'total_expenses' => $content['total_expenses'],
    //                 'date' => Carbon::parse($content['date'])->format('Y-m-d H:i:s'),
    //             ];
    //         }
    
    //         // Insert the new data
    //         UddesignReport::insert($array_of_data);
    
    //         return response()->json([
    //             'successful' => true,
    //             'message' => 'Data refreshed successfully!',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'successful' => false,
    //             'message' => 'Failed to fetch data from the API.',
    //         ], $response->status());
    //     }
    // }

    // public function refreshData() 
    // {
    //     $token = 'I4RUPL9LIXx4PkG24JURjbsHvlum3lwHFAAYtFrt2e9d598bb';

    //     // Make the GET request using the Http facade
    //     $response = Http::withToken($token)->get('http://uddesign-main.test/api/data');

    //     if ($response->status() == 401) {
    //         // Handle the invalid token scenario
    //         return response()->json([
    //             'successful' => false,
    //             'message' => 'Invalid API token. Please provide a valid token.',
    //         ], 401);
    //     }

    //     if ($response->successful()) {
    //         $body_contents = $response->json();

    //         // Check if 'data' key exists in response
    //         if (!isset($body_contents['data']) || is_null($body_contents['data'])) {
    //             return response()->json([
    //                 'successful' => false,
    //                 'message' => 'No data found in the API response.',
    //             ], 404);
    //         }

    //         // Truncate the existing table data
    //         UddesignReport::truncate();

    //         // Prepare the data array
    //         $array_of_data = [];

    //         foreach ($body_contents['data'] as $content) {
    //             $array_of_data[] = [
    //                 'cash' => $content['cash'] ?? 0,
    //                 'gcash' => $content['gcash'] ?? 0,
    //                 'print_sales' => $content['print_sales'] ?? 0,
    //                 'merch_sales' => $content['merch_sales'] ?? 0,
    //                 'custom_sales' => $content['custom_sales'] ?? 0,
    //                 'total_sales' => $content['total_sales'] ?? 0,
    //                 'print_expenses' => $content['print_expenses'] ?? 0,
    //                 'merch_expenses' => $content['merch_expenses'] ?? 0,
    //                 'custom_expenses' => $content['custom_expenses'] ?? 0,
    //                 'total_expenses' => $content['total_expenses'] ?? 0,
    //                 'date' => isset($content['date']) ? Carbon::parse($content['date'])->format('Y-m-d H:i:s') : null,
    //             ];
    //         }

    //         // Insert the new data
    //         UddesignReport::insert($array_of_data);

    //         return response()->json([
    //             'successful' => true,
    //             'message' => 'Data refreshed successfully!',
    //         ]);
    //     } else {
    //         return response()->json([
    //             'successful' => false,
    //             'message' => 'Failed to fetch data from the API.',
    //         ], $response->status());
    //     }
    // }

    public function refreshData(Request $request)
    {
        // Retrieve the API token from the session
        $apiToken = $request->session()->get('uddesign_api_token');

        if (!$apiToken) {
            return redirect()->back()->with('failed', 'API token not found in session.');
        }

        // Make the GET request using the Http facade with the token
        $response = Http::withToken($apiToken)->get(env('MY_API_URL', '') . '/api/data');

        if ($response->successful()) {
            $body_contents = $response->json();

            // Truncate the existing table data
            UddesignReport::truncate();

            // Prepare the data array
            $array_of_data = [];

            foreach ($body_contents['data'] as $content) {
                $array_of_data[] = [
                    'cash' => $content['cash'],
                    'gcash' => $content['gcash'],
                    'print_sales' => $content['print_sales'],
                    'merch_sales' => $content['merch_sales'],
                    'custom_sales' => $content['custom_sales'],
                    'total_sales' => $content['total_sales'],
                    'print_expenses' => $content['print_expenses'],
                    'merch_expenses' => $content['merch_expenses'],
                    'custom_expenses' => $content['custom_expenses'],
                    'total_expenses' => $content['total_expenses'],
                    'date' => Carbon::parse($content['date'])->format('Y-m-d H:i:s'),
                ];
            }

            // Insert the new data
            UddesignReport::insert($array_of_data);

            return redirect()->back()->with('success', 'Data refreshed successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to fetch data from the API.');
        }
    }
    public function Uddesign_Refresh_Data(Request $request)
    {
        // Retrieve the API token from the session
        $apiToken = $request->session()->get('uddesign_api_token');

        if (!$apiToken) {
            return redirect()->back()->with('failed', 'API token not found in session.');
        }

        // Make the GET request using the Http facade with the token
        $response = Http::withToken($apiToken)->get(env('UDDESIGN_API_URL', '') . '/api/data');

        if ($response->successful()) {
            $body_contents = $response->json();

            // Truncate the existing table data
            UddesignReport::truncate();

            // Prepare the data array
            $array_of_data = [];

            foreach ($body_contents['data'] as $content) {
                $array_of_data[] = [
                    'cash' => $content['cash'],
                    'gcash' => $content['gcash'],
                    'print_sales' => $content['print_sales'],
                    'merch_sales' => $content['merch_sales'],
                    'custom_sales' => $content['custom_sales'],
                    'total_sales' => $content['total_sales'],
                    'print_expenses' => $content['print_expenses'],
                    'merch_expenses' => $content['merch_expenses'],
                    'custom_expenses' => $content['custom_expenses'],
                    'total_expenses' => $content['total_expenses'],
                    'date' => Carbon::parse($content['date'])->format('Y-m-d H:i:s'),
                ];
            }

            // Insert the new data
            UddesignReport::insert($array_of_data);

            return redirect()->back()->with('success', 'Data refreshed successfully!');
        } else {
            return redirect()->back()->with('failed', 'Failed to fetch data from the API.');
        }
    }

    


}