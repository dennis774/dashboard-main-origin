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
use App\Models\KuwagoOne\KuwagoOneDishes;
use App\Models\KuwagoTwo\KuwagoTwoDishes;
use App\Models\Uddesign\UddesignMerchType;
use App\Models\Uddesign\UddesignPrintType;
use App\Models\KuwagoOne\KuwagoOneCategory;
use App\Models\KuwagoTwo\KuwagoTwoCategory;
use App\Models\Uddesign\UddesignExpenseType;
use App\Models\Uddesign\UddesignMerchDetail;
use App\Models\Uddesign\UddesignPrintDetail;
use App\Models\Uddesign\UddesignExpenseDetail;
use App\Models\Uddesign\UddesignMerchCategory;
use App\Models\Uddesign\UddesignPrintCategory;
use App\Models\KuwagoOne\KuwagoOneOrderDetails;
use App\Models\KuwagoTwo\KuwagoTwoOrderDetails;
use App\Models\Uddesign\UddesignExpenseCategory;

class DataController extends Controller
{
    // UNIVERSAL REFRESH BUTTON HANDLER
    public function refreshData(Request $request, $type)
    {
        switch ($type) {
            case 'uddesign':
                $this->Uddesign_Refresh_Data($request);
                $this->refreshUddesignDetails($request, 'uddesign_api_token', env('UDDESIGN_API_URL', ''));
                break;
            case 'kuwago_one':
                $this->Kuwago_One_Refresh_Data($request);
                $this->refreshOrderDetails($request, 'kuwago_one_api_token', env('KUWAGO_ONE_API_URL', ''), KuwagoOneOrderDetails::class);
                break;
            case 'kuwago_two':
                $this->Kuwago_Two_Refresh_Data($request);
                $this->refreshOrderDetails($request, 'kuwago_two_api_token', env('KUWAGO_TWO_API_URL', ''), KuwagoTwoOrderDetails::class);
                break;
            default:
                return back()->with('failed', 'Invalid type specified.');
        }

        return back()->with('status', 'Data refreshed successfully!');
    }

    // UDDESIGN DATA REFRESH FUNCTION
    public function Uddesign_Refresh_Data(Request $request)
    {
        $apiToken = $request->session()->get('uddesign_api_token');
        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/data', UddesignReport::class, function ($report) {
            return [
                'cash' => $report['cash'],
                'gcash' => $report['gcash'],
                'print_sales' => $report['print_sales'],
                'merch_sales' => $report['merch_sales'],
                'custom_sales' => $report['custom_sales'],
                'total_sales' => $report['total_sales'],
                'print_expenses' => $report['print_expenses'],
                'merch_expenses' => $report['merch_expenses'],
                'custom_expenses' => $report['custom_expenses'],
                'total_expenses' => $report['total_expenses'],
                'date' => Carbon::parse($report['date'])->format('Y-m-d H:i:s'),
            ];
        });

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/merch-category', UddesignMerchCategory::class, function ($category) {
            return [
                'merch_category_id' => $category['id'],
                'name' => $category['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/merch-type', UddesignMerchType::class, function ($merch) {
            return [
                'merch_type_id' => $merch['id'],
                'merch_category_id' => $merch['merch_category_id'],
                'name' => $merch['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/print-category', UddesignPrintCategory::class, function ($category) {
            return [
                'print_category_id' => $category['id'],
                'name' => $category['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/print-type', UddesignPrintType::class, function ($print) {
            return [
                'print_type_id' => $print['id'],
                'print_category_id' => $print['print_category_id'],
                'name' => $print['name'],
            ];
        });


        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/expense-category', UddesignExpenseCategory::class, function ($category) {
            return [
                'expense_category_id' => $category['id'],
                'name' => $category['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('UDDESIGN_API_URL', ''), '/api/expense-type', UddesignExpenseType::class, function ($print) {
            return [
                'expense_type_id' => $print['id'],
                'expense_category_id' => $print['expense_category_id'],
                'name' => $print['name'],
            ];
        });
    }

    // KUWAGO ONE DATA REFRESH FUNCTION
    public function Kuwago_One_Refresh_Data(Request $request)
    {
        $apiToken = $request->session()->get('kuwago_one_api_token');
        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        $this->fetchAndInsertData($apiToken, env('KUWAGO_ONE_API_URL', ''), '/api/reports', KuwagoOneReport::class, function ($report) {
            return [
                'cash' => $report['cash'],
                'gcash' => $report['gcash'],
                'sales' => $report['total_remittance'],
                'date' => $report['date'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('KUWAGO_ONE_API_URL', ''), '/api/categories', KuwagoOneCategory::class, function ($category) {
            return [
                'category_id' => $category['id'],
                'name' => $category['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('KUWAGO_ONE_API_URL', ''), '/api/dishes', KuwagoOneDishes::class, function ($dish) {
            return [
                'dish_id' => $dish['id'],
                'category_id' => $dish['category_id'],
                'name' => $dish['name'],
            ];
        });
    }

    // KUWAGO TWO DATA REFRESH FUNCTION
    public function Kuwago_Two_Refresh_Data(Request $request)
    {
        $apiToken = $request->session()->get('kuwago_two_api_token');
        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        $this->fetchAndInsertData($apiToken, env('KUWAGO_TWO_API_URL', ''), '/api/reports', KuwagoTwoReport::class, function ($report) {
            return [
                'orders' => $report['orders'],
                'cash' => $report['cash'],
                'gcash' => $report['gcash'],
                'sales' => $report['sales'],
                'expenses' => $report['expenses'],
                'date' => $report['date'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('KUWAGO_TWO_API_URL', ''), '/api/categories', KuwagoTwoCategory::class, function ($category) {
            return [
                'category_id' => $category['id'],
                'name' => $category['name'],
            ];
        });

        $this->fetchAndInsertData($apiToken, env('KUWAGO_TWO_API_URL', ''), '/api/dishes', KuwagoTwoDishes::class, function ($dish) {
            return [
                'dish_id' => $dish['id'],
                'category_id' => $dish['category_id'],
                'name' => $dish['name'],
            ];
        });
    }

    // UNIVERSAL ORDER DETAILS REFRESH FUNCTION
    public function refreshOrderDetails(Request $request, $tokenKey, $baseUrl, $model)
    {
        $apiToken = $request->session()->get($tokenKey);
        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        $this->fetchAndInsertDataInBatches($apiToken, $baseUrl, '/api/order-details', $model, function ($orderDetail) {
            return [
                'dish_id' => $orderDetail['dish_id'],
                'pcs' => $orderDetail['pcs'],
                'date' => Carbon::parse($orderDetail['date'])->format('Y-m-d H:i:s'),
            ];
        });

        return redirect()
            ->back()
            ->with('success', 'Order Details refreshed successfully!');
    }

    public function refreshUddesignDetails(Request $request, $tokenKey, $baseUrl)
    {
        $apiToken = $request->session()->get($tokenKey);
        if (!$apiToken) {
            return redirect()
                ->back()
                ->with('failed', 'API token not found in session.');
        }

        $this->fetchAndInsertDataInBatches($apiToken, $baseUrl, '/api/merch-details', UddesignMerchDetail::class, function ($detail) {
            return [
                'merch_type_id' => $detail['merch_type_id'],
                'pcs' => $detail['pcs'],
                'date' => Carbon::parse($detail['date'])->format('Y-m-d H:i:s'),
            ];
        });

        $this->fetchAndInsertDataInBatches($apiToken, $baseUrl, '/api/print-details', UddesignPrintDetail::class, function ($detail) {
            return [
                'print_type_id' => $detail['print_type_id'],
                'pcs' => $detail['pcs'],
                'date' => Carbon::parse($detail['date'])->format('Y-m-d H:i:s'),
            ];
        });

        $this->fetchAndInsertDataInBatches($apiToken, $baseUrl, '/api/expense-details', UddesignExpenseDetail::class, function ($detail) {
            return [
                'expense_type_id' => $detail['expense_type_id'],
                'price' => $detail['price'],
                'date' => Carbon::parse($detail['date'])->format('Y-m-d H:i:s'),
            ];
        });

        return redirect()
            ->back()
            ->with('success', 'Details refreshed successfully!');
    }

    // UNIVERSAL FETCH DATA FUNCTION
    private function fetchAndInsertData($apiToken, $baseUrl, $endpoint, $model, $dataMappingCallback)
    {
        $response = Http::withToken($apiToken)->get($baseUrl . $endpoint);

        if ($response->failed()) {
            return redirect()
                ->back()
                ->with('failed', 'Failed to fetch data from the API.');
        }

        $data = $response->json();

        // Truncate the existing table data
        $model::truncate();

        // Prepare the data array
        $dataArray = [];
        foreach ($data['data'] as $item) {
            $dataArray[] = $dataMappingCallback($item);
        }

        // Insert the new data
        $model::insert($dataArray);
    }

    // UNIVERSAL FETCH DATA IN BATCHES FUNCTION
    private function fetchAndInsertDataInBatches($apiToken, $baseUrl, $endpoint, $model, $dataMappingCallback, $batchSize = 1000)
    {
        $response = Http::withToken($apiToken)->get($baseUrl . $endpoint);

        if ($response->failed()) {
            return redirect()
                ->back()
                ->with('failed', 'Failed to fetch data from the API.');
        }

        $data = $response->json();
        $model::truncate();

        // Prepare the data array and insert in batches
        $dataArray = [];
        foreach ($data['data'] as $item) {
            $dataArray[] = $dataMappingCallback($item);

            // When data array reaches batch size, insert it and reset the array
            if (count($dataArray) >= $batchSize) {
                $model::insert($dataArray);
                $dataArray = [];
            }
        }

        // Insert any remaining data
        if (!empty($dataArray)) {
            $model::insert($dataArray);
        }
    }
}
