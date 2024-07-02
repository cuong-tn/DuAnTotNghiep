<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bills;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $bills = Bills::paginate(10);
        return view('admin.bills.index', compact('bills'));
    }

    public function create()
    {
        return view('admin.bills.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            // 'bill_name' => 'required|string|max:255',
            // 'bill_type' => 'required|string|max:255',
            // 'user_id' => 'required|integer',
            // 'email' => 'required|email|max:255',
            // 'address' => 'required|string|max:255',
            // 'promotion_id' => 'nullable|integer',
            // 'buy_date' => 'required|date',
            // 'cost' => 'required|numeric',
            // 'discount_price' => 'nullable|numeric',
            // 'shipping_fee' => 'required|numeric',
            // 'qr_code' => 'nullable|string|max:255',
            // 'note' => 'nullable|string',
            // 'estimated_delivery_date' => 'nullable|date',
            // 'delivery_date' => 'nullable|date',
            // 'recipient_name' => 'required|string|max:255',
            // 'status' => 'required|string|max:255',
        ]);

        // Create a new bill record
        Bills::create($validatedData);

        return redirect()->route('admin.bills.index')->with('success', 'Bill created successfully.');
    }

    public function show($id)
    {
        $bill = Bills::findOrFail($id);
        return view('admin.bills.show', compact('bill'));
    }

    public function edit($id)
    {
        $bill = Bills::findOrFail($id);
        return view('admin.bills.edit', compact('bill'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'bill_name' => 'required|string|max:255',
            'bill_type' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'promotion_id' => 'nullable|integer',
            'buy_date' => 'required|date',
            'cost' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'shipping_fee' => 'required|numeric',
            'qr_code' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'estimated_delivery_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'recipient_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        // Find the existing bill record and update it
        $bill = Bills::findOrFail($id);
        $bill->update($validatedData);

        return redirect()->route('bills.index')->with('success', 'Bill updated successfully.');
    }

    public function destroy($id)
    {
        // Find the existing bill record and delete it
        $bill = Bills::findOrFail($id);
        $bill->delete();

        return redirect()->route('bills.index')->with('success', 'Bill deleted successfully.');
    }
}
