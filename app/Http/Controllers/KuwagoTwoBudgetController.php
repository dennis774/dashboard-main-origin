<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KuwagoTwoBudget;

class KuwagoTwoBudgetController extends Controller
{
    public function create()
    {
        return view('roles.general.budget-allocation.kuwagotwo-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        KuwagoTwoBudget::create($request->all());


        return redirect()->route('targetSales.index')->with('success', 'Budget allocation created successfully!');
    }

    public function edit(KuwagoTwoBudget $kuwagoTwoBudget)
    {
        $kuwagoTwoBudget->start_date = Carbon::parse($kuwagoTwoBudget->start_date);
        $kuwagoTwoBudget->end_date = Carbon::parse($kuwagoTwoBudget->end_date);
        return view('roles.general.budget-allocation.kuwagotwo-edit', compact('kuwagoTwoBudget'));
    }

    public function update(Request $request, KuwagoTwoBudget $kuwagoTwoBudget)
    {
        $request->validate([
            'business_type' => 'required|string',
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $kuwagoTwoBudget->update($request->all());

        return redirect()->route('targetSales.index')->with('success', 'Budget allocation updated successfully!');
    }

    public function destroy(KuwagoTwoBudget $kuwagoTwoBudget)
    {
        $kuwagoTwoBudget->delete();

        return redirect()->route('targetSales.index')->with('success', 'Budget allocation deleted successfully!');
    }

    public function setDisplayKuwagoTwoBudget($id)
    {
        // Reset all other target sales
        KuwagoTwoBudget::query()->update(['is_displayed' => false]);
    
        // Set the specific target sale to be displayed
        KuwagoTwoBudget::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Kuwago One Budget allocations has been set to display.');
    }
}
