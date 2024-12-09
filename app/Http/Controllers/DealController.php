<?php
namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    // Display all deals
    public function index()
{
    $deals = Deal::with('dealItems')->orderBy('created_at', 'desc')->get();
    return view('general.uddesign.uddeals', compact('deals'));
}


    

    // Show the form for creating a new deal
    public function create()
    {
        return view('deals.create');
    }

    // Store a newly created deal
    public function store(Request $request)
{
    $request->validate([
        'deal_name' => 'required|string|max:255',
        'client_name' => 'required|string|max:255',
        'contact_number' => 'required|string|max:255',
        'email' => 'nullable|email',
        'date_approved' => 'nullable|date',
        'production_due_date' => 'nullable|date',
        'payment_method' => 'nullable|string',
        'cash' => 'nullable|numeric',
        'gcash' => 'nullable|numeric',
        'cash_gcash' => 'nullable|numeric',
        'date_closed' => 'nullable|date',
        'items' => 'required|array',
        'items.*.description' => 'required|string|max:255',
        'items.*.quantity' => 'required|numeric',
        'items.*.unit_price' => 'required|numeric',
        'items.*.total_price' => 'required|numeric',
        'grand_price' => 'required|numeric',
        'status' => 'required|in:Open,Processing,Closed,On-Hold,Cancelled',
    ]);

    // Create the deal
    $deal = Deal::create([
        'deal_name' => $request->deal_name,
        'client_name' => $request->client_name,
        'contact_number' => $request->contact_number,
        'email' => $request->email,
        'date_approved' => $request->date_approved,
        'production_due_date' => $request->production_due_date,
        'payment_method' => $request->payment_method,
        'cash' => $request->cash,
        'gcash' => $request->gcash,
        'cash_gcash' => $request->cash_gcash,
        'date_closed' => $request->date_closed,
        'grand_price' => $request->grand_price,
        'status' => $request->status,
    ]);

    // Store the items associated with the deal
    foreach ($request->items as $item) {
        $deal->items()->create([
            'description' => $item['description'],
            'quantity' => $item['quantity'],
            'unit_price' => $item['unit_price'],
            'total_price' => $item['total_price'],
        ]);
    }

    return redirect()->route('general.uddesign.uddeals');
}


    // Show the form for editing the specified deal
    public function edit(Deal $deal)
    {
        return view('deals.edit', compact('deal'));
    }

    // Update the specified deal
    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'deal_name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'email' => 'nullable|email',
            'date_approved' => 'nullable|date',
            'production_due_date' => 'nullable|date',
            'payment_method' => 'nullable|string',
            'cash' => 'nullable|numeric',
            'gcash' => 'nullable|numeric',
            'cash_gcash' => 'nullable|numeric',
            'date_closed' => 'nullable|date',
            'items' => 'required|array',
            'items.*.description' => 'required|string|max:255',
            'items.*.quantity' => 'required|numeric',
            'items.*.unit_price' => 'required|numeric',
            'items.*.total_price' => 'required|numeric',
            'grand_price' => 'required|numeric',
            'status' => 'required|in:Open,Processing,Closed,On-Hold,Cancelled',
        ]);

        $deal->update([
            'deal_name' => $request->deal_name,
            'client_name' => $request->client_name,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'date_approved' => $request->date_approved,
            'production_due_date' => $request->production_due_date,
            'payment_method' => $request->payment_method,
            'cash' => $request->cash,
            'gcash' => $request->gcash,
            'cash_gcash' => $request->cash_gcash,
            'date_closed' => $request->date_closed,
            'items' => json_encode($request->items),
            'grand_price' => $request->grand_price,
            'status' => $request->status,
        ]);

        $deal->items()->delete();

        // Add new items to the deal
        foreach ($request->items as $item) {
            $deal->items()->create([
                'description' => $item['description'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['total_price'],
            ]);
        }

        return redirect()->route('general.uddesign.uddeals');
    }

    // Remove the specified deal from storage
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('general.uddesign.uddeals');
    }
}
