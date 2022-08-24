<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

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
            return redirect('login')->back()->with('error', 'Email or password does not match.');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
