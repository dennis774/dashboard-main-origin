<?php

namespace App\Http\Controllers\Api;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\UddesignReport;
use Illuminate\Support\Carbon;
use App\Models\KuwagoOneReport;
use App\Models\KuwagoTwoReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function refreshData(Request $request)
    {
        // Call the first function
        $this->Uddesign_Refresh_Data($request);

        // Call the second function
        $this->Kuwago_One_Refresh_Data($request);

        // Call the second function
        $this->Kuwago_Two_Refresh_Data($request);

        // Return a response
        return back()->with('status', 'Data refreshed successfully!');
    }

    public function Uddesign_Refresh_Data(Request $request)
    {
        // Retrieve the API token from the session
        $apiToken = $request->session()->get('uddesign_api_token');

        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
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

            return redirect()
                ->back()
                ->with('success', 'Data refreshed successfully!');
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Failed to fetch data from the API.');
        }
    }

    public function Kuwago_One_Refresh_Data(Request $request)
    {
        // Retrieve the API token from the session
        $apiToken = $request->session()->get('kuwago_one_api_token');

        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        // Make the GET request using the Http facade with the token
        $response = Http::withToken($apiToken)->get(env('KUWAGO_ONE_API_URL', '') . '/api/data');

        if ($response->successful()) {
            $body_contents = $response->json();

            // Truncate the existing table data
            KuwagoOneReport::truncate();

            // Prepare the data array
            $array_of_data = [];

            foreach ($body_contents['data'] as $content) {
                $array_of_data[] = [
                    'cash' => $content['cash'],
                    'gcash' => $content['gcash'],
                    'sales' => $content['total_remittance'],
                    'date' => $content['date'],
                ];
            }

            // Insert the new data
            KuwagoOneReport::insert($array_of_data);

            return redirect()
                ->back()
                ->with('success', 'Data refreshed successfully!');
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Failed to fetch data from the API.');
        }
    }

    public function Kuwago_Two_Refresh_Data(Request $request)
    {
        // Retrieve the API token from the session
        $apiToken = $request->session()->get('kuwago_two_api_token');

        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        // Make the GET request using the Http facade with the token
        $response = Http::withToken($apiToken)->get(env('KUWAGO_TWO_API_URL', '') . '/api/data');

        if ($response->successful()) {
            $body_contents = $response->json();

            // Truncate the existing table data
            KuwagoTwoReport::truncate();

            // Prepare the data array
            $array_of_data = [];

            foreach ($body_contents['data'] as $content) {
                $array_of_data[] = [
                    'orders' => $content['orders'],
                    'cash' => $content['cash'],
                    'gcash' => $content['gcash'],
                    'sales' => $content['sales'],
                    'expenses' => $content['expenses'],
                    'date' => $content['date'],
                ];
            }

            // Insert the new data
            KuwagoTwoReport::insert($array_of_data);

            return redirect()
                ->back()
                ->with('success', 'Data refreshed successfully!');
        } else {
            return redirect()
                ->back()
                ->with('failed', 'Failed to fetch data from the API.');
        }
    }
}
