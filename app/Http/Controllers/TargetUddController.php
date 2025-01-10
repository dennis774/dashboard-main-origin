<?php

namespace App\Http\Controllers;

use App\Models\TargetUdd;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TargetUddController extends Controller
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
        return view('targetUdd.create');
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
        $targetUdd = new targetUdd($request->all());
        $targetUdd->start_date = Carbon::parse($request->start_date);
        $targetUdd->end_date = Carbon::parse($request->end_date);
        $targetUdd->save();


        return redirect()->route('targetSales.index')->with('success', 'New Uddesign Target sale created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TargetUdd $targetUdd)
    {
        // Convert dates to Carbon instances before showing the edit form
        $targetUdd->start_date = Carbon::parse($targetUdd->start_date);
        $targetUdd->end_date = Carbon::parse($targetUdd->end_date);


        return view('targetUdd.edit', compact('targetUdd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TargetUdd $targetUdd)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        // Update the target sale, ensuring dates are Carbon instances
        $targetUdd->update([
            'amount' => $request->amount,
            'start_date' => Carbon::parse($request->start_date),
            'end_date' => Carbon::parse($request->end_date),
        ]);


        return redirect()->route('targetSales.index')->with('success', 'New Uddesign Target sale updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TargetUdd $targetUdd)
    {
        $targetUdd->delete();


        return redirect()->route('targetSales.index')->with('success', 'New Uddesign Target sale deleted successfully!');
    }

    public function setDisplayTargetUdd($id)
    {
        // Reset all other target sales
        TargetUdd::query()->update(['is_displayed' => false]);

        // Set the specific target sale to be displayed
        TargetUdd::where('id', $id)->update(['is_displayed' => true]);

        return redirect()->back()->with('status', 'New Uddesign Target sale has been set to display.');
    }
}
