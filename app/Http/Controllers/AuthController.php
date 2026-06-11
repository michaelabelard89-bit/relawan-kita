<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function showLogin() {
        if (Auth::check()) return $this->redirectByRole();
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        if (Auth::attempt($request->only('email','password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectByRole()->with('success', 'Selamat datang, '.Auth::user()->name.'!');
        }

        return back()->withInput($request->only('email'))
            ->with('error', 'Email atau password salah.');
    }

    public function showRegister() {
        if (Auth::check()) return $this->redirectByRole();
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required'      => 'Nama wajib diisi.',
            'email.required'     => 'Email wajib diisi.',
            'email.unique'       => 'Email sudah terdaftar.',
            'password.min'       => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('home')->with('success', 'Akun berhasil dibuat! Selamat datang, '.$user->name.'!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Anda berhasil logout.');
    }

    private function redirectByRole() {
        return Auth::user()->isAdmin()
            ? redirect()->route('admin.events.index')
            : redirect()->route('home');
    }
}