<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;

class StockManagerController extends Controller
{
   public function reportOrder(Request $request)
    {
        $orders = $this->getFilteredOrders($request);
        return view('stock_manager.report_order', compact('orders'));
    }

    public function downloadPDF(Request $request)
    {
        $orders = $this->getFilteredOrders($request);
        $pdf = PDF::loadView('stock_manager.report_pdf', compact('orders', 'request'));

        return $pdf->download('order_report.pdf');
    }

    private function getFilteredOrders(Request $request)
    {
        $query = Order::query();

        if ($request->filled('from')) {
            $query->whereDate('created_at', '>=', $request->from);
        }

        if ($request->filled('to')) {
            $query->whereDate('created_at', '<=', $request->to);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return $query->orderBy('created_at', 'desc')->get();
    }


    public function generatePdf(Request $request)
{
    $from = $request->from;
    $to = $request->to;
    $status = $request->status;

    $query = \App\Models\Order::query();

    if ($from && $to) {
        $query->whereBetween('created_at', [$from, $to]);
    }

    if ($status) {
        $query->where('status', $status);
    }

    $orders = $query->get();

    $pdf = Pdf::loadView('stock_manager.report_pdf', [
        'orders' => $orders,
        'request' => $request,
    ]);

    // ✅ Display PDF in browser instead of downloading
    return $pdf->stream('order_report.pdf');
}




}
