<?php

namespace App\Http\Controllers;

use App\Models\TargetSales;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BudgetAllocation;
use App\Models\KuwagoTwoBudget;
use App\Models\KuwagoTwoTargetSale;
use App\Models\UddesignBudget;
use App\Models\UddesignTargetSale;

class TargetSalesController extends Controller
{
    // Show the list of target sales
    public function index()
    {
        // Get all target sales and convert dates to Carbon instances, ordered by start_date descending
        $targetSales = TargetSales::orderBy('start_date', 'desc')->get()->map(function ($targetSale) {
            $targetSale->start_date = Carbon::parse($targetSale->start_date);
            $targetSale->end_date = Carbon::parse($targetSale->end_date);
            return $targetSale;
        });

        // Get all budget allocations and convert dates to Carbon instances, ordered by start_date descending
        $budgetAllocations = BudgetAllocation::orderBy('start_date', 'desc')->get()->map(function ($budgetAllocation) {
            $budgetAllocation->start_date = Carbon::parse($budgetAllocation->start_date);
            $budgetAllocation->end_date = Carbon::parse($budgetAllocation->end_date);
            return $budgetAllocation;
        });

        // Get all KuwagoTwo target sales and convert dates to Carbon instances, ordered by start_date descending
        $kuwagoTwoTargets = KuwagoTwoTargetSale::orderBy('start_date', 'desc')->get()->map(function ($kuwagoTwoTarget) {
            $kuwagoTwoTarget->start_date = Carbon::parse($kuwagoTwoTarget->start_date);
            $kuwagoTwoTarget->end_date = Carbon::parse($kuwagoTwoTarget->end_date);
            return $kuwagoTwoTarget;
        });

        // Get all KuwagoTwo budget allocations and convert dates to Carbon instances, ordered by start_date descending
        $kuwagoTwoBudgets = KuwagoTwoBudget::orderBy('start_date', 'desc')->get()->map(function ($kuwagoTwoBudget) {
            $kuwagoTwoBudget->start_date = Carbon::parse($kuwagoTwoBudget->start_date);
            $kuwagoTwoBudget->end_date = Carbon::parse($kuwagoTwoBudget->end_date);
            return $kuwagoTwoBudget;
        });

        // Get all Uddesign target sales and convert dates to Carbon instances, ordered by start_date descending
        $uddesignTargets = UddesignTargetSale::orderBy('start_date', 'desc')->get()->map(function ($uddesignTarget) {
            $uddesignTarget->start_date = Carbon::parse($uddesignTarget->start_date);
            $uddesignTarget->end_date = Carbon::parse($uddesignTarget->end_date);
            return $uddesignTarget;
        });

        // Get all Uddesign budget allocations and convert dates to Carbon instances, ordered by start_date descending
        $uddesignBudgets = UddesignBudget::orderBy('start_date', 'desc')->get()->map(function ($uddesignBudget) {
            $uddesignBudget->start_date = Carbon::parse($uddesignBudget->start_date);
            $uddesignBudget->end_date = Carbon::parse($uddesignBudget->end_date);
            return $uddesignBudget;
        });

        // Pass all data to the view
        return view('roles.general.financial-target.index', compact('targetSales', 'budgetAllocations', 'kuwagoTwoTargets', 'kuwagoTwoBudgets', 'uddesignTargets', 'uddesignBudgets'));
    }


    // Show the form for creating a new target sale
    public function create()
    {
        return view('roles.general.financial-target.create');
    }

    // Store a newly created target sale in the database
    public function store(Request $request)
    {
        $request->validate([
            // 'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Ensure that the start_date and end_date are parsed correctly before creating
        $targetSale = new TargetSales($request->all());
        $targetSale->start_date = Carbon::parse($request->start_date);
        $targetSale->end_date = Carbon::parse($request->end_date);
        $targetSale->save();


        return redirect()->route('targetSales.index')->with('success', 'Target sale created successfully!');
    }

    // Show the form for editing the specified target sale
    public function edit(TargetSales $targetSale)
    {
        // Convert dates to Carbon instances before showing the edit form
        $targetSale->start_date = Carbon::parse($targetSale->start_date);
        $targetSale->end_date = Carbon::parse($targetSale->end_date);


        return view('roles.general.financial-target.edit', compact('targetSale'));
    }

    // Update the specified target sale in the database
    public function update(Request $request, TargetSales $targetSale)
    {
        $request->validate([
            // 'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Update the target sale, ensuring dates are Carbon instances
        $targetSale->update([
            // 'business_type' => $request->business_type,
            'amount' => $request->amount,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ]);


        return redirect()->route('targetSales.index')->with('success', 'Target sale updated successfully!');
    }

    // Remove the specified target sale from the database
    public function destroy(TargetSales $targetSale)
    {
        $targetSale->delete();


        return redirect()->route('targetSales.index')->with('success', 'Target sale deleted successfully!');
    }

    // public function fetchTargetSaleAmount(Request $request)
    // {
    //     $businessType = $request->input('business_type');
    //     $targetSale = TargetSales::where('business_type', $businessType)->first();

    //     if ($targetSale) {
    //         return response()->json([
    //             'amount' => '₱' . number_format($targetSale->amount, 2)
    //         ]);
    //     }

    //     return response()->json([
    //         'amount' => null
    //     ]);
    // }

    // public function showTargetSales(Request $request)
    // {
    //     $targetSales = TargetSales::all();  // Fetch all target sales

    //     return view('general.kuwago-one.dashboard', compact('targetSales'));
    // }

    // public function showTargetSale(Request $request, $displayIdentifier)
    // {
    //     // Fetch the target sale by display identifier
    //     $targetSale = TargetSales::where('display_identifier', $displayIdentifier)->first();

    //     return view('general.kuwago-one.dashboard', compact('targetSale'));
    // }


    public function setDisplayTargetSale($id)
    {
        // Reset all other target sales
        TargetSales::query()->update(['is_displayed' => false]);

        // Set the specific target sale to be displayed
        TargetSales::where('id', $id)->update(['is_displayed' => true]);

        return redirect()->back()->with('status', 'New Kuwago One Target sale has been set to display.');
    }
}
