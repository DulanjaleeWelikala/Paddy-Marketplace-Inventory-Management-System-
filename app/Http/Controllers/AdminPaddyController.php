<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paddy;

class AdminPaddyController extends Controller
{
    public function index()
    {
        $paddies = Paddy::all(); // Fetch all paddies
        return view('admin.paddylist', compact('paddies'));
    }
}