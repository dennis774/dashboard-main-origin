<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UddesignBudget;
use Illuminate\Support\Carbon;

class UddesignBudgetController extends Controller
{

    public function create()
    {
        return view('roles.general.budget-allocation.uddesign-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        UddesignBudget::create($request->all());


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation created successfully!');
    }

    public function edit(UddesignBudget $uddesignBudget)
    {   
        $uddesignBudget->start_date = Carbon::parse($uddesignBudget->start_date);
        $uddesignBudget->end_date = Carbon::parse($uddesignBudget->end_date);
        return view('roles.general.budget-allocation.uddesign-edit', compact('uddesignBudget'));
    }

    public function update(Request $request, UddesignBudget $uddesignBudget)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $uddesignBudget->update([
            'amount' => $request->amount,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ]);

        return redirect()->route('targetSales.index')->with('success', 'Budget allocation updated successfully!');
    }

    public function destroy(UddesignBudget $uddesignBudget)
    {
        $uddesignBudget->delete();


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation deleted successfully!');
    }

    public function setDisplayUddesignBudget($id)
    {
        // Reset all other target sales
        UddesignBudget::query()->update(['is_displayed' => false]);
    
        // Set the specific target sale to be displayed
        UddesignBudget::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Kuwago One Budget allocations has been set to display.');
    }
}
