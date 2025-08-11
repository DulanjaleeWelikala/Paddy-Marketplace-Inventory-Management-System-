<?php

namespace App\Http\Controllers;

use App\Models\ReturnPaddy;
use App\Models\Paddy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    // Show the returns list
    public function index()
    {
        $returns = ReturnPaddy::with('paddy')->latest()->get();

        return view('stock_manager.return', compact('returns'));
    }

    /**
     * Handle return stock POST.
     */
    public function store(Request $request)
    {
        $request->validate([
            'paddy_id' => 'required|exists:paddies,id',
            'quantity' => 'required|numeric|min:0.01',
            'reason' => 'required|string|max:255',
            'return_date' => 'required|date',
        ]);

        // Get the paddy item
        $paddy = Paddy::findOrFail($request->paddy_id);

        // Check if enough quantity available
        if ($request->quantity > $paddy->quantity) {
            return back()->with('error', 'Return quantity exceeds available stock.');
        }

        // Reduce quantity from stock
        $paddy->quantity -= $request->quantity;
        $paddy->save();

        // Add return record
        ReturnPaddy::create([
            'paddy_id' => $paddy->id,
            'product_name' => $paddy->product_name,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
            'return_date' => $request->return_date,
            'returned_by' => Auth::id(),
        ]);

        return back()->with('success', 'Stock returned successfully.');
    }
}

