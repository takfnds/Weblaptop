<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendLoginController extends Controller
{
    public function getLogin()
    {
        return view('backend.auth.login');
    }

    public function postLogin(Request $request)
    {
        if (\Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('get_backend.home');
        }

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        \Auth::guard('admins')->logout();
        $request->session()->invalidate();
        return redirect()->back();
    }
}
