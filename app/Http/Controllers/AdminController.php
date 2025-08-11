<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        

        $usertype = Auth::user()->usertype;

        // Redirect user based on usertype
        if ($usertype == 'user') {
            return view('index'); // user dashboard view
        } elseif ($usertype == 'admin') {
            return view('admin.index'); // admin dashboard view
        } elseif ($usertype == 'manager') {
            return view('stock_manager.index'); // manager dashboard view
        } else {
            abort(403, 'Unauthorized Access');  // other roles no access
        }
    }

   
}
