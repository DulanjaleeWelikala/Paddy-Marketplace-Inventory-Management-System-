<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Notifications\OrderApprovedNotification;

class StockOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('paddy', 'admin')->where('status', 'pending')->get();
        return view('stock_manager.orders', compact('orders'));
    }


    public function approve($id)
    {

        $order->admin->notify(new OrderApprovedNotification($order));

        $order = Order::findOrFail($id);
        $order->status = 'approved';

        $pdf = Pdf::loadView('invoice', compact('order'));
        $filePath = 'invoices/invoice_order_' . $order->id . '.pdf';
        $pdf->save(public_path($filePath));

        $order->invoice_path = $filePath;
        $order->save();

        return redirect()->back()->with('success', 'Order approved and invoice sent.');
    }
}
