<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // --- FUNGSI REGISTRASI ---
    public function register(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'nama'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:user',
            'no_telp'  => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed', // Harus ada input password_confirmation di FE
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 2. Simpan User baru
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

    // --- FUNGSI LOGIN ---
    public function login(Request $request)
    {
        // 1. Validasi input email & password
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cari user di database
        $user = User::where('email', $request->email)->first();

        // 3. Cek apakah user ada dan password benar
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah!'
            ], 401);
        }

        // 4. Buat Token (Sanctum)
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login berhasil!',
            'access_token'  => $token,
            'token_type'    => 'Bearer',
            'user'          => $user
        ]);
    }
}