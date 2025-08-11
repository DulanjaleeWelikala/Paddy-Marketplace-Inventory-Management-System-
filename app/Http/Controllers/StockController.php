<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function index()
    {
        $stock = Order::select(
            'orders.paddy_id',
            'paddies.product_name as product_name',
            DB::raw('SUM(orders.quantity) as total_quantity'),
            DB::raw('MAX(orders.created_at) as created_at')
        )
        ->join('paddies', 'orders.paddy_id', '=', 'paddies.id')
        ->where('orders.status', 'accepted') // Only accepted orders
        ->groupBy('orders.paddy_id', 'paddies.product_name')
        ->get();

        $totalSystemStock = $stock->sum('total_quantity');
        $maxCapacity = 100000; // Max system capacity
        $remainingCapacity = $maxCapacity - $totalSystemStock;

        return view('stock_manager.stock', compact(
            'stock', 'totalSystemStock', 'maxCapacity', 'remainingCapacity'
        ));
    }
}
