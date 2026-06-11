@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

{{-- HERO --}}
<section class="bg-gradient-to-br from-blue-50 to-emerald-50 py-20 lg:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="inline-block bg-blue-100 text-blue-700 text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-widest mb-6">Komunitas Relawan #1</span>
                <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                    Berikan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-emerald-600">Dampak Nyata</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed">Terhubung dengan peluang relawan yang bermakna dan bergabunglah dengan ribuan penggerak perubahan di Indonesia.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('events.index') }}" class="bg-blue-600 text-white px-10 py-4 rounded-full hover:bg-blue-700 transition font-bold text-center shadow-xl">
                        Jelajahi Peluang <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="{{ route('about') }}" class="bg-white text-gray-700 px-10 py-4 rounded-full hover:bg-gray-50 transition font-bold text-center border border-gray-200">
                        Pelajari Kami
                    </a>
                </div>
                <div class="mt-12 flex items-center gap-10">
                    <div><div class="text-3xl font-black text-gray-900">{{ $totalEvents }}+</div><div class="text-xs font-bold text-gray-400 uppercase">Kegiatan Aktif</div></div>
                    <div class="w-px h-10 bg-gray-200"></div>
                    <div><div class="text-3xl font-black text-gray-900">{{ $totalRegistrans }}+</div><div class="text-xs font-bold text-gray-400 uppercase">Relawan Terdaftar</div></div>
                </div>
            </div>
            <div class="relative">
                <div class="rounded-3xl overflow-hidden shadow-2xl rotate-2 hover:rotate-0 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800&h=600&fit=crop" alt="Relawan" class="w-full h-auto">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FEATURED EVENTS --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-gray-900 mb-4">Kegiatan Terbaru</h2>
            <div class="h-1.5 w-20 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredEvents as $event)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                <div class="relative h-48 overflow-hidden">
                    @if($event->image_url)
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-100 to-emerald-100 flex items-center justify-center">
                            <i class="fas fa-calendar-alt text-5xl text-gray-300"></i>
                        </div>
                    @endif
                    <div class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-xs font-bold text-gray-700">
                        {{ $event->category }}
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 text-lg mb-2 group-hover:text-blue-600 transition line-clamp-2">{{ $event->title }}</h3>
                    <p class="text-gray-500 text-sm mb-3 flex items-center gap-1"><i class="fas fa-map-marker-alt text-blue-500"></i> {{ $event->location }}</p>
                    <p class="text-gray-500 text-sm mb-4 flex items-center gap-1"><i class="fas fa-calendar text-blue-500"></i> {{ $event->formatted_date }}</p>
                    <a href="{{ route('events.show', $event) }}" class="block w-full bg-blue-600 text-white py-2 rounded-xl text-center text-sm font-bold hover:bg-blue-700 transition">
                        Lihat Detail
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('events.index') }}" class="inline-block bg-gray-100 text-gray-700 px-8 py-3 rounded-full font-semibold hover:bg-gray-200 transition">
                Lihat Semua Kegiatan <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-gray-900 mb-4">Langkah Sederhana Jadi Relawan</h2>
            <div class="h-1.5 w-20 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center group">
                <div class="bg-blue-50 w-24 h-24 rounded-3xl flex items-center justify-center mb-6 mx-auto group-hover:bg-blue-600 transition-all duration-300">
                    <i class="fas fa-search text-blue-600 text-3xl group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">1. Cari Kegiatan</h3>
                <p class="text-gray-500">Temukan peluang yang sesuai dengan minat dan keahlianmu.</p>
            </div>
            <div class="text-center group">
                <div class="bg-emerald-50 w-24 h-24 rounded-3xl flex items-center justify-center mb-6 mx-auto group-hover:bg-emerald-600 transition-all duration-300">
                    <i class="fas fa-user-check text-emerald-600 text-3xl group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">2. Klik Daftar</h3>
                <p class="text-gray-500">Proses pendaftaran instan tanpa ribet.</p>
            </div>
            <div class="text-center group">
                <div class="bg-purple-50 w-24 h-24 rounded-3xl flex items-center justify-center mb-6 mx-auto group-hover:bg-purple-600 transition-all duration-300">
                    <i class="fas fa-hands-helping text-purple-600 text-3xl group-hover:text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">3. Beraksi</h3>
                <p class="text-gray-500">Hadir dan buatlah perbedaan nyata di sekitarmu.</p>
            </div>
        </div>
    </div>
</section>
@endsection