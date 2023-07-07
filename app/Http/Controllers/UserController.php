<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        // Validasi input email dan password
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Jika validasi gagal, redirect kembali ke halaman login dengan pesan error
        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        // Lakukan proses otentikasi dengan menggunakan credentials yang telah divalidasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, regenerate session dan redirect ke dashboard
            $request->session()->regenerate();
            return redirect('/dashboard');
        } else {
            // Jika otentikasi gagal, redirect kembali ke halaman login dengan pesan error
            return redirect('/login')->with('loginError', 'Email atau Password invalid');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
