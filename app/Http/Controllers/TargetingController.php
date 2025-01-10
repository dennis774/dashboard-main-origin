<?php

namespace App\Http\Controllers;

use App\Models\Budgeting;
use App\Models\BudgetUdd;
use App\Models\Targeting;
use App\Models\TargetUdd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TargetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $targetings = Targeting::orderBy('start_date', 'desc')->get()->map(function ($targeting) {
    //         $targeting->start_date = Carbon::parse($targeting->start_date);
    //         $targeting->end_date = Carbon::parse($targeting->end_date);
    //         return $targeting;
    //     });

    //     $budgetings = Budgeting::orderBy('start_date', 'desc')->get()->map(function ($budgeting) {
    //         $budgeting->start_date = Carbon::parse($budgeting->start_date);
    //         $budgeting->end_date = Carbon::parse($budgeting->end_date);
    //         return $budgeting;
    //     });

    //     $targetUdds = TargetUdd::orderBy('start_date', 'desc')->get()->map(function ($targetUdd) {
    //         $targetUdd->start_date = Carbon::parse($targetUdd->start_date);
    //         $targetUdd->end_date = Carbon::parse($targetUdd->end_date);
    //         return $targetUdd;
    //     });

    //     $budgetUdds = BudgetUdd::orderBy('start_date', 'desc')->get()->map(function ($budgetUdd) {
    //         $budgetUdd->start_date = Carbon::parse($budgetUdd->start_date);
    //         $budgetUdd->end_date = Carbon::parse($budgetUdd->end_date);
    //         return $budgetUdd;
    //     });

    //     return view('targeting.index', compact('targetings', 'budgetings', 'targetUdds', 'budgetUdds'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('targeting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Ensure that the start_date and end_date are parsed correctly before creating
        $targeting = new Targeting($request->all());
        $targeting->start_date = Carbon::parse($request->start_date);
        $targeting->end_date = Carbon::parse($request->end_date);
        $targeting->save();


        return redirect()->route('targetSales.index')->with('success', 'Target sale created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Targeting $targeting)
    {
        // Convert dates to Carbon instances before showing the edit form
        $targeting->start_date = Carbon::parse($targeting->start_date);
        $targeting->end_date = Carbon::parse($targeting->end_date);


        return view('targeting.edit', compact('targeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Targeting $targeting)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Update the target sale, ensuring dates are Carbon instances
        $targeting->update([
            'amount' => $request->amount,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ]);


        return redirect()->route('targetSales.index')->with('success', 'Target sale updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Targeting $targeting)
    {
        $targeting->delete();


        return redirect()->route('targetSales.index')->with('success', 'Target sale deleted successfully!');
    }

    public function setDisplayTargeting($id)
    {
        // Reset all other target sales
        Targeting::query()->update(['is_displayed' => false]);

        // Set the specific target sale to be displayed
        Targeting::where('id', $id)->update(['is_displayed' => true]);

        return redirect()->back()->with('status', 'New Kuwago One Target sale has been set to display.');
    }
}
