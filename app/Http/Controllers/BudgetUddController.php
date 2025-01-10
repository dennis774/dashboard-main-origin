<?php

namespace App\Http\Controllers;

use App\Models\BudgetUdd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BudgetUddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budgetUdd.create');
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

        BudgetUdd::create($request->all());

        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BudgetUdd $budgetUdd)
    {
        $budgetUdd->start_date = Carbon::parse($budgetUdd->start_date);
        $budgetUdd->end_date = Carbon::parse($budgetUdd->end_date);

        return view('budgetUdd.edit', compact('budgetUdd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BudgetUdd $budgetUdd)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $budgetUdd->update($request->all());

        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BudgetUdd $budgetUdd)
    {
        $budgetUdd->delete();

        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation deleted successfully!');
    }

    public function setDisplayBudgetUdd($id)
    {
        // Reset all other target sales
        BudgetUdd::query()->update(['is_displayed' => false]);

        // Set the specific target sale to be displayed
        BudgetUdd::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Kuwago Two Budget allocations has been set to display.');
    }
}
