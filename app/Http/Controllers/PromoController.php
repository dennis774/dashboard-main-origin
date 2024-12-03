<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    // Show all promos
    public function index()
    {
        $promos = Promo::orderBy('created_at', 'desc')->get();
        return view('general.kuwago-one.promos', compact('promos'));
    }


    // Show form for creating a new promo
    public function create()
    {
        return view('promos.create');
    }


    // Store new promo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'sales_before' => 'required|numeric',
            'sales_after' => 'required|numeric',
            'description' => 'required',
            'dishes_available' => 'required',
            'promo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('promos', 'public');
        }
   
        Promo::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'sales_before' => $request->sales_before,
            'sales_after' => $request->sales_after,
            'description' => $request->description,
            'dishes_available' => $request->dishes_available,
            'promo_image' => $imagePath,
        ]);
   
        return redirect()->route('general.kuwago-one.promos');
    }
   
 
   


    // Show form for editing a promo
    public function edit(Promo $promo)
    {
        return view('promos.edit', compact('promo'));
    }


    // Update an existing promo
    public function update(Request $request, Promo $promo)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'sales_before' => 'required|numeric',
            'sales_after' => 'required|numeric',
            'description' => 'required',
            'dishes_available' => 'required',
            'promo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($promo->image) {
                Storage::disk('public')->delete($promo->image);
            }
            $promo->image = $request->file('image')->store('promos', 'public');
        }
   
        $promo->update([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'sales_before' => $request->sales_before,
            'sales_after' => $request->sales_after,
            'description' => $request->description,
            'dishes_available' => $request->dishes_available,
            'promo_image' => $promo->image,
        ]);
   
        return redirect()->route('general.kuwago-one.promos')->with('success', 'Promo updated successfully!');
    }


    // Delete a promo
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->route('general.kuwago-one.promos');
    }

}
