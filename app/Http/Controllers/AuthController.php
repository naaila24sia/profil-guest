<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //  TAMPILKAN FORM LOGIN
    public function index()
    {
        return view('pages.auth.login');
    }

    // PROSES LOGIN
    public function login(Request $request)
    {
        // Validasi sederhana sesuai modul
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        // $dataLogin = [
        //     'email'    => $request->email,
        //     'password' => $request->password,
        // ];

        // Auth::attempt = Auth::login() versi modul
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            session([
                'last_login' => now()->setTimezone('Asia/Jakarta')->format('d M Y H:i') . ' WIB',
            ]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['Login gagal, periksa email atau password.']);
    }

    // LOGOUT
    public function logout()
    {
        Auth::logout(); // Modul: Auth::logout()

        return redirect()->route('login.form');
    }

    // HALAMAN DASHBOARD (Hanya jika login)
    public function dashboard()
    {
        // Modul: Auth::check()
        if (! Auth::check()) {
            return redirect()->route('login.form')->withErrors(['Silakan login terlebih dahulu.']);
        }

        return view('dashboard');
    }
}
