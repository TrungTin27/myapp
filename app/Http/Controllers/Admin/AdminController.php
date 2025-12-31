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

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {

            // Redirect tùy vai trò
            return redirect()->route('admin.index'); // hoặc admin.dashboard.index


        }
        return back()->withErrors(['email' => 'Email or password is incorrect']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
    public function changePass(Request $request)
    {
        Auth::changePass();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/changePass');
    }

    public function index()
    {
        return view('admin.layout.app');
    }
}
