<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\UddesignTargetSale;

class UddesignTargetController extends Controller
{

    public function create()
    {
        return view('roles.general.financial-target.uddesign-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        UddesignTargetSale::create($request->all());

        return redirect()->route('targetSales.index')->with('success', 'Target sale created successfully!');
    }

    public function edit(UddesignTargetSale $uddesignTargetSale)
    {
        $uddesignTargetSale->start_date = Carbon::parse($uddesignTargetSale->start_date);
        $uddesignTargetSale->end_date = Carbon::parse($uddesignTargetSale->end_date);

        return view('roles.general.financial-target.uddesign-edit', compact('uddesignTargetSale'));
    }

    public function update(Request $request, UddesignTargetSale $uddesignTargetSale)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $uddesignTargetSale->update($request->all());

        return redirect()->route('targetSales.index')->with('success', 'Target sale updated successfully!');
    }

    public function destroy(UddesignTargetSale $uddesignTargetSale)
    {
        $uddesignTargetSale->delete();

        return redirect()->route('targetSales.index')->with('success', 'Target sale deleted successfully!');
    }

    public function setDisplayUddesignTarget($id)
    {
        // Reset all other target sales
        UddesignTargetSale::query()->update(['is_displayed' => false]);
    
        // Set the specific target sale to be displayed
        UddesignTargetSale::where('id', $id)->update(['is_displayed' => true]);
    
        return redirect()->back()->with('status', 'New Uddesign Target sale has been set to display.');
    }
}
