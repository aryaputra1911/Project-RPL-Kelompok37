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
        ], [
            'nama.required'       => 'Nama lengkap wajib diisi.',
            'email.required'      => 'Email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email sudah terdaftar.',
            'no_telp.required'    => 'Nomor WhatsApp wajib diisi.',
            'password.required'   => 'Password wajib diisi.',
            'password.min'        => 'Password minimal 8 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'no_telp'  => $request->no_telp,
            'password' => Hash::make($request->password),
        ]);

        // Auto-login setelah register
        Auth::login($user);
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Registrasi berhasil! Selamat bergabung di PeakRent.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Tampilkan halaman lupa password
    public function showLupaPassword()
    {
        return view('lupapw');
    }

    // Proses kirim email reset (simpan email ke session, redirect ke reset)
    public function kirimReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }

        // Simpan email ke session agar halaman reset tahu milik siapa
        $request->session()->put('reset_email', $request->email);

        return redirect('/reset-password');
    }

    // Tampilkan halaman reset password
    public function showResetPassword(Request $request)
    {
        // Pastikan ada email di session (tidak boleh akses langsung)
        if (!$request->session()->has('reset_email')) {
            return redirect('/lupa-password');
        }
        return view('resetpw');
    }

    // Proses simpan password baru
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password'              => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $email = $request->session()->get('reset_email');

        if (!$email) {
            return redirect('/lupa-password')->withErrors(['email' => 'Sesi reset password tidak valid. Silakan ulangi.']);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect('/lupa-password')->withErrors(['email' => 'User tidak ditemukan.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus session reset
        $request->session()->forget('reset_email');

        return redirect('/login')->with('success', 'Password berhasil direset! Silakan login dengan password baru.');
    }
}
