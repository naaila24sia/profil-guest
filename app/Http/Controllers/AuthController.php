<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login
     */
    public function index()
    {
        return view('pages.auth.login-form');
    }

    /**
     * Proses login user
     */
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => ['required', 'min:3', 'regex:/[A-Z]/'],
        ];

        $messages = [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
            'password.regex' => 'Password harus mengandung setidaknya satu huruf kapital.',
        ];

        $request->validate($rules, $messages);

        // Cek user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['Email tidak ditemukan'])->withInput();
        }

        // Cek password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['Password salah'])->withInput();
        }

        // Simpan session
        session(['user_id' => $user->id]);

        // Arahkan ke dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        session()->forget('user_id');
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }

    /**
     * Halaman Dashboard setelah login
     */
    public function dashboard()
    {
        if (!session('user_id')) {
            return redirect()->route('login.form')->withErrors(['Silakan login terlebih dahulu']);
        }

        $user = User::find(session('user_id'));
        return view('dashboard', compact('user'));
    }
}
