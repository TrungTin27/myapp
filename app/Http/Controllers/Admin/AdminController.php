<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {

            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // 🔥 QUAN TRỌNG

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
