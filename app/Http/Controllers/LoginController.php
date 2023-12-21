<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'emailAddress' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::guard('admin_users')->attempt($request->only('emailAddress', 'password'))) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('error', 'Email or Password is Invalid

            ');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('adminLogin');
    }
}
