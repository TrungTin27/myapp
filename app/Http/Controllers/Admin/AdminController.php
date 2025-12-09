<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
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

    public function index()
    {
        return view('admin.index');
    }
}
