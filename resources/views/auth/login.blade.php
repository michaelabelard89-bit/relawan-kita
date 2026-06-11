@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gradient-to-br from-blue-50 to-emerald-50">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 py-8 px-8 text-white text-center">
            <i class="fas fa-hands-helping text-4xl mb-3"></i>
            <h1 class="text-2xl font-bold">Masuk ke RelawanKita</h1>
            <p class="text-blue-100 text-sm mt-1">Bergabunglah dengan ribuan relawan Indonesia</p>
        </div>
        <div class="p-8">
            @if($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
                    @foreach($errors->all() as $e)
                        <p class="text-sm text-red-700">{{ $e }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="nama@email.com">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="••••••••">
                </div>
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="rounded">
                        Ingat saya
                    </label>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-500">Belum punya akun?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:underline">Daftar Sekarang</a>
                </p>
            </div>

            <div class="mt-6 p-4 bg-gray-50 rounded-xl text-xs text-gray-500 space-y-1">
                <p class="font-semibold text-gray-600">Akun Demo:</p>
                <p>👑 Admin: admin@relawankita.com / admin123</p>
                <p>👤 User: user@relawankita.com / user123</p>
            </div>
        </div>
    </div>
</div>
@endsection