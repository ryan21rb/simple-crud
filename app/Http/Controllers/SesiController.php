<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('mobil.index');
            } elseif ($user->role == 'staff') {
                return redirect()->route('customer_mobil.index');
            }
        }

        return redirect()->back()->withErrors('Username dan password yang di temukan tidak sesuai')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
