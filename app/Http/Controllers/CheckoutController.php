<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paddy;

class CheckoutController extends Controller
{    
     public function index()
{
    $paddies = Paddy::all();
    return view('checkout', compact('paddies'));
}


    // Show the checkout page for a specific paddy product
    public function checkout($id)
{
    $paddy = Paddy::find($id);

    if (!$paddy) {
        return redirect()->back()->withErrors('Paddy product not found.');
    }

    return view('checkout', compact('paddy'));
}

}
