<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate(
            [
                'name' => 'required',
                'password' => 'required',
            ]
        );

        $remember_me = $request->has('remember-me')? true:false;

        if (Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->with('failed', 'Percobaan masuk gagal. Silahkan coba lagi!');
    }
}
