<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KuwagoTwoTargetSale;

class KuwagoTwoTargetController extends Controller
{
    public function create()
    {
        return view('roles.general.financial-target.kuwagotwo-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        KuwagoTwoTargetSale::create($request->all());

        return redirect()->route('targetSales.index')->with('success', 'Target sale created successfully!');
    }

    public function edit(KuwagoTwoTargetSale $kuwagoTwoTargetSale)
    {
        // Convert dates to Carbon instances before showing the edit form
        $kuwagoTwoTargetSale->start_date = Carbon::parse($kuwagoTwoTargetSale->start_date);
        $kuwagoTwoTargetSale->end_date = Carbon::parse($kuwagoTwoTargetSale->end_date);
        
        return view('roles.general.financial-target.kuwagotwo-edit', compact('kuwagoTwoTargetSale'));
    }

    public function update(Request $request, KuwagoTwoTargetSale $kuwagoTwoTargetSale)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $kuwagoTwoTargetSale->update($request->all());

        return redirect()->route('targetSales.index')->with('success', 'Target sale updated successfully!');
    }

    public function destroy(KuwagoTwoTargetSale $kuwagoTwoTargetSale)
    {
        $kuwagoTwoTargetSale->delete();

        return redirect()->route('targetSales.index')->with('success', 'Target sale deleted successfully!');
    }

    public function setDisplayKuwagoTwoTarget($id)
    {
        // Reset all other target sales
        KuwagoTwoTargetSale::query()->update(['is_displayed' => false]);
    
        // Set the specific target sale to be displayed
        KuwagoTwoTargetSale::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Uddesign Target sale has been set to display.');
    }
}
