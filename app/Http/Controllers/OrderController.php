<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Paddy;
use App\Models\User;
use App\Models\Notification;
use App\Notifications\NewOrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{

    // Order place කරන method එක
public function placeOrder(Request $request)
{
    $request->validate([
        'paddy_id' => 'required',
        'quantity' => 'required|numeric|min:25',
        'payment_method' => 'required',
    ]);

    $paddy = Paddy::findOrFail($request->paddy_id);
    $stockManager = auth()->user(); // Stock manager

    if ($request->quantity > $paddy->quantity) {
        return back()->with('error', 'Order quantity exceeds available stock.');
    }

    $totalSystemStock = Order::sum('quantity');
    if (($totalSystemStock + $request->quantity) > 100000) {
        return back()->with('error', 'The system-wide stock limit (100,000kg) will be exceeded. Order cannot be placed.');
    }

    // Deduct ordered quantity from available stock
    $paddy->quantity -= $request->quantity;
    $paddy->save();

    // Create Order
    $order = new Order();
    $order->paddy_id = $paddy->id;
    $order->product_name = $paddy->product_name;
    $order->stock_manager_id = $stockManager->id;
    $order->farmer_id = $paddy->added_by;
    $order->quantity = $request->quantity;
    $order->price = $paddy->price * $request->quantity;
    $order->payment_method = $request->payment_method;
    $order->status = 'pending';
    
    if ($request->has('rejection_reason')) {
        $order->rejection_reason = $request->rejection_reason;
    }

    $order->save();

    $order->load('paddy');
    $paddy = $order->paddy;

    if (!$paddy) {
        return back()->with('error', 'Paddy record not found for this order.');
    }

    // Notify Farmer
    $farmer = User::find($paddy->added_by);
    if ($farmer) {
        $farmer->notify(new NewOrderNotification($order));
    }

    // ✅ Real-time alert to stock manager if low stock
    if ($paddy->quantity < 25) {
        $stockManagerUser = User::where('usertype', 'stock_manager')->first();
        if ($stockManagerUser) {
            $stockManagerUser->notify(new LowStockAlertNotification($paddy));
        }
    }

    // ✅ Real-time alert if total stock in system exceeds limit
    $totalAvailableStock = Paddy::sum('available_quantity');
    if ($totalAvailableStock >= 100000) {
        $stockManagerUser = User::where('usertype', 'stock_manager')->first();
        if ($stockManagerUser) {
            $stockManagerUser->notify(new StockFullNotification());
        }
    }

    return redirect()->route('/varaity')->with('success', 'Order placed. Awaiting farmer approval.');
}

 public function myOrders()
{
    $managerId = auth()->id();
    $orders = Order::where('stock_manager_id', $managerId)
                    ->with('paddy')
                    ->orderBy('created_at', 'desc')
                    ->get();

    return view('stock_manager.orders', compact('orders'));
}


public function showOrders()
{
    $orders = Order::with('paddy', 'farmer')->get();

    $totalSystemStock = \App\Models\Paddy::sum('quantity');
    $maxCapacity = 100000;

    return view('stock_manager.orders', compact('orders', 'totalSystemStock', 'maxCapacity'));
}


public function checkout($paddy_id)
{
    $paddy = Paddy::where('paddy_id', $paddy_id)->firstOrFail();

    // Calculate total system stock (based on all ordered paddy)
    $totalSystemStock = Order::sum('quantity');

    // Define system max capacity
    $maxCapacity = 100000;

    return view('checkout', compact('paddy', 'totalSystemStock', 'maxCapacity'));
}

  
   // Farmer accept කරන function එක
    public function accept(Order $order)
    {
        $order->status = 'accepted';
        $order->rejection_reason = null;
        $order->save();

        return redirect()->back()->with('success', 'Order accepted successfully.');
    }

    // Farmer reject කරන function එක, rejection reason එක collect කරලා save කරනවා
  public function reject(Request $request, Order $order)
{
    $request->validate([
        'reason' => 'required|string|max:500',
    ]);

    $order->status = 'rejected';
    $order->rejection_reason = $request->reason;
    $order->save();

    // Restore paddy quantity
    $paddy = $order->paddy;
    
    if ($paddy) {
        $paddy->quantity += $order->quantity;
        $paddy->save();
    }

    return redirect()->route('mypaddies')->with('success', 'Order rejected and stock updated.');
}


  public function edit($id)
{
    $order = Order::findOrFail($id);
    return view('stock_manager.orders', compact('order'));
}


  public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()->route('/stock_manager.orders')->with('success', 'Order deleted successfully.');
}

public function cancel($orderId)
{
    try {
        DB::transaction(function () use ($orderId) {
            $order = Order::findOrFail($orderId);

            if ($order->status == 'cancelled' || $order->quantity == 0) {
                throw new \Exception('Order already cancelled.');
            }

            $paddy = Paddy::findOrFail($order->paddy_id);

            $paddy->available_quantity += $order->quantity;
            $paddy->save();

            $order->quantity = 0;
            $order->status = 'cancelled';
            $order->save();
        });

        return back()->with('success', 'Order cancelled and stock updated.');
    } catch (\Exception $e) {
        return back()->with('error', $e->getMessage());
    }
}


public function update(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
        'payment_method' => 'required|string|max:255',
        // validate other inputs as needed
    ]);

    $order = Order::findOrFail($id);

    $order->quantity = $request->input('quantity');
    $order->payment_method = $request->input('payment_method');

    // Assign the stock manager id — e.g., current logged-in user id
    $order->stock_manager_id = auth()->id();

    $order->save();

    return redirect()->back()->with('success', 'Order updated successfully!');
}



}
