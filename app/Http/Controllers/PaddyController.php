<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paddy;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PaddyController extends Controller
{
    /**
     * Show all paddy varieties.
     */
    public function index()
    {
        $paddyVarieties = Paddy::all(); // Now uses correct model
        return view('varaity', compact('paddyVarieties'));
    }

    public function create()
{
    return view('varaity'); // or whatever your blade file name is
}

    /**
     * Store a new paddy variety.
     */
    public function store(Request $request)
    {
    
        // Validate the form inputs
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description'  => 'required|string',
            'price'        => 'required|numeric|min:0',
            'quantity'     => 'required|numeric|min:0.1',
            'badge'        => 'nullable|string',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Check for existing product name
        $existing = Paddy::where('product_name', $request->product_name)->first();

        if ($existing) {
            // Reuse existing ID
            $paddyId = $existing->paddy_id;
        } else {
            // Generate new ID (e.g., PD1, PD2...)
            $last = Paddy::latest('id')->first();
            $nextNumber = $last ? ((int) filter_var($last->paddy_id, FILTER_SANITIZE_NUMBER_INT)) + 1 : 1;
            $paddyId = 'PD' . $nextNumber;
        }

        // Store the image in public/storage/paddies
        $imagePath = $request->file('image')->store('paddies', 'public');

        // Create the record
        Paddy::create([
            'paddy_id'     => $paddyId,
            'product_name' => $request->product_name,
            'description'  => $request->description,
            'price'        => $request->price,
            'quantity'     => $request->quantity,
            'badge'        => $request->badge,
            'image'        => $imagePath,
            'added_by'     => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Paddy product added successfully!');
    }


    


}
