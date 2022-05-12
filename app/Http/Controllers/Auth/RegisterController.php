<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nik' => 'required|unique:users|digits:16'
        ],
        [
            'name.required' => 'Nama tidak boleh kosong.',
            'nik.unique' => 'NIK sudah terdaftar.'
        ])->validate();

        $validatedData = [
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'password' => bcrypt($validated['nik'])
        ];

        User::create($validatedData);
        return redirect('/')->with('success', 'Daftar akun berhasil. Silahkan login!');
    }
}
