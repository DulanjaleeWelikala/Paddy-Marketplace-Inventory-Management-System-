<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login — not used here since we override authenticated().
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * After user is authenticated, redirect based on user type and port.
     */
    protected function authenticated(Request $request, $user)
    {
        $port = $request->getPort();
        $role = $user->usertype;

        if ($port == 8000 && $role == 'user') {
            return redirect('/index');
        } elseif ($port == 8001 && $role == 'admin') {
            return redirect('/admin/index');
        } elseif ($port == 8002 && $role == 'manager') {
            return redirect('/stock_manager/index');
        }

        // Wrong port - logout and show error
        Auth::logout();
        return redirect('/login')->withErrors([
            'msg' => 'ඔබට මේ port එකෙන් ලොග් විය නොහැක.',
        ]);
    }
}
