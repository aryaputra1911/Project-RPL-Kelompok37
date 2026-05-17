<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('login');
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect('/');
        }
        return view('register');
    }

    // Proses login via web (session)
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah!'
            ], 401);
        }

        Auth::login($user);
        $request->session()->regenerate();

        // Buat token Sanctum juga (untuk kompatibilitas dengan frontend JS)
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Login berhasil!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user
        ]);
    }

    // Proses register via web
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:user',
            'no_telp'  => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_telp'  => $request->no_telp,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Registrasi berhasil!',
            'user'    => $user
        ], 201);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
