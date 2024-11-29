<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Ambil input email dan password dari request
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial cocok dengan data di database
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, arahkan ke halaman yang dituju
            return redirect()->intended('/');
        }

        // Jika login gagal, kembalikan error
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Jika validasi gagal, kembalikan error dan input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data user baru dengan password yang telah dienkripsi
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Enkripsi password
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('auth.login')->with('success', 'Registration successful. Please login.');
    }

    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');  // Redirect ke halaman login
    }
}
