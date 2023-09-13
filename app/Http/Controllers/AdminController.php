<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:30',
            'password' => 'required',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $username, 'password' => $password])) {

            return view('admin.index'); // Gideceğin sayfa...
        } else {
            return redirect()->back()->with('error', 'yok');
        }
    }
}
