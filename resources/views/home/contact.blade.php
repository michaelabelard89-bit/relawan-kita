@extends('layouts.app')
@section('title', 'Kontak')
@section('content')
<section class="bg-gradient-to-br from-blue-50 to-emerald-50 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Hubungi Kami</h1>
        <p class="text-xl text-gray-600 italic">"Sekecil apa pun pesanmu, itu adalah langkah awal menuju perubahan besar."</p>
    </div>
</section>
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="space-y-6">
                <h2 class="text-2xl font-bold text-gray-900">Informasi Kontak</h2>
                <div class="bg-white p-6 rounded-2xl shadow-sm border flex gap-4 items-center">
                    <div class="bg-blue-100 p-4 rounded-xl text-blue-600"><i class="fas fa-map-marker-alt text-xl"></i></div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Lokasi</p><p class="text-gray-900 font-semibold">Jakarta, Indonesia</p></div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border flex gap-4 items-center">
                    <div class="bg-emerald-100 p-4 rounded-xl text-emerald-600"><i class="fas fa-envelope text-xl"></i></div>
                    <div><p class="text-xs text-gray-400 font-bold uppercase">Email</p><p class="text-gray-900 font-semibold">halo@relawankita.com</p></div>
                </div>
            </div>
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-xl p-8 border">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" placeholder="Nama Depan" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                        <input type="text" placeholder="Nama Belakang" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <input type="email" placeholder="Email Aktif" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    <textarea rows="4" placeholder="Pesan Anda..." class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none resize-none"></textarea>
                    <button class="w-full bg-blue-600 text-white py-4 rounded-2xl font-bold hover:bg-blue-700 transition shadow-lg">
                        Kirim Pesan <i class="fas fa-paper-plane ml-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection