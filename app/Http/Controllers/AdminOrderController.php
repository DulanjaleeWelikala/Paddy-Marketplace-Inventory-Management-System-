<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Paddy;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\NewAdminOrderNotification;

class AdminOrderController extends Controller
{
    public function create()
    {
        $paddies = \App\Models\Paddy::all();
        return view('admin.orders', compact('paddies'));
    }

    public function store(Request $request)
    {
        $stockManagers = User::where('usertype', 'stock_manager')->get();

        foreach ($stockManagers as $manager) {
    $manager->notify(new NewAdminOrderNotification());

        Order::create([
            'admin_id' => Auth::id(),
            'paddy_id' => $request->paddy_id,
            'quantity' => $request->quantity,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Order placed successfully.');
    }
}
}

