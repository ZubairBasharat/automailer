<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\SeoAdministrator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(Request $request) {
        return view('admin.auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('usuario', 'password');
        if (Auth::guard('admin')->attempt($credentials)) 
        {
            return redirect()->route('admin.dashboard');
        }
        else {
            return redirect()->route('admin.login.show')->with('message', 'Email or Password is incorrect');
        }
    }
    
    public function destroy(Request $request) {
      Auth::guard('admin')->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('admin.login.show');
    }
}
