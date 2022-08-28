<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Admin Show Login Form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Admin Login Check Function
    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $auth = User::where('email', $request->email)->first();

        if ($auth && Hash::check($request->password, $auth->password) && $auth->role == 'admin') {

            session([
                'id' => $auth->id,
                'name' => $auth->name,
                'email' => $auth->email,
                'phone' => $auth->phone,
                'role' => $auth->role,
                'designation' => $auth->designation,
            ]);

            return redirect('dashboard');

        } else {
            return back()->with('error', 'Email or password does not match.');
        }
    }

    // User Show Login Form
    public function userShowLoginForm()
    {
        return view('frontend.auth.user-login');
    }

    // User Login Check Function
    public function userLoginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $auth = User::where('email', $request->email)->first();

        if ($auth && Hash::check($request->password, $auth->password) && $auth->role == 'user') {

            session([
                'user_id' => $auth->id,
                'user_name' => $auth->name,
                'user_email' => $auth->email,
                'user_phone' => $auth->phone,
                'user_role' => $auth->role,
                'user_designation' => $auth->designation,
            ]);

            return redirect()->route('show.form.kha');

        } else {
            return back()->with('error', 'Email or password does not match.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
