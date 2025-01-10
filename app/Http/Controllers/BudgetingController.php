<?php

namespace App\Http\Controllers;

use App\Models\Budgeting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BudgetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $budgetings = Budgeting::all();
    //     return view('targeting.index', compact('budgetings'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budgeting.create');
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


        Budgeting::create($request->all());


        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Budgeting $budgeting)
    {
        $budgeting->start_date = Carbon::parse($budgeting->start_date);
        $budgeting->end_date = Carbon::parse($budgeting->end_date);

        return view('budgeting.edit', compact('budgeting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budgeting $budgeting)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        $budgeting->update($request->all());


        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budgeting $budgeting)
    {
        $budgeting->delete();


        return redirect()->route('targetSales.index')->with('success', 'New Kuwago Two Budget allocation deleted successfully!');
    }

    public function setDisplayBudgeting($id)
    {
        // Reset all other target sales
        Budgeting::query()->update(['is_displayed' => false]);

        // Set the specific target sale to be displayed
        Budgeting::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Kuwago Two Budget allocations has been set to display.');
    }
}
