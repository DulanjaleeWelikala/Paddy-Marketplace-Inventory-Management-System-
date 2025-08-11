<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paddy;
use PDF;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function generatePaddyPDF()
    {
        $paddies = Paddy::all();
        $pdf = PDF::loadView('admin.pdf', compact('paddies'))->setPaper('A4', 'portrait');
        return $pdf->stream('paddy_variety_report.pdf');
    }


     public function paddyOrdersReport(Request $request)
   {
    $from = $request->input('from');
    $to = $request->input('to');
    $filter = $request->input('filter');

    $query = DB::table('orders')
        ->join('paddies', 'orders.paddy_id', '=', 'paddies.id')
        ->select(
            DB::raw('DATE(orders.created_at) as date'),
            'paddies.product_name as product_name', // ✅ corrected
            DB::raw('SUM(orders.quantity) as total_quantity'),
            DB::raw('COUNT(orders.id) as order_count')
        )
        ->where('orders.status', 'approved');

    if ($from && $to) {
        $query->whereBetween('orders.created_at', [$from, \Carbon\Carbon::parse($to)->endOfDay()]);
    }

    if ($filter == 'daily') {
        $query->groupBy(DB::raw('DATE(orders.created_at)'), 'product_name');
    } elseif ($filter == 'weekly') {
        $query->selectRaw('YEARWEEK(orders.created_at) as date')
              ->groupBy(DB::raw('YEARWEEK(orders.created_at)'), 'product_name');
    } elseif ($filter == 'monthly') {
        $query->selectRaw('DATE_FORMAT(orders.created_at, "%Y-%m") as date')
              ->groupBy(DB::raw('DATE_FORMAT(orders.created_at, "%Y-%m")'), 'product_name');
    } else {
        $query->groupBy(DB::raw('DATE(orders.created_at)'), 'product_name');
    }

    $report = $query->orderBy('date', 'desc')->get();

    return view('stock_manager.report_order', compact('report'));
  }
}
