@extends('layouts.app')
@section('title', 'Kegiatan Relawan')
@section('content')
<section class="bg-gradient-to-br from-blue-50 to-emerald-50 py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-3">Temukan Peluang Berikutnya</h1>
        <p class="text-xl text-gray-600">Jelajahi berbagai kegiatan relawan sesuai minat Anda.</p>
    </div>
</section>

<section class="py-6 bg-white border-b sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4">
        <form method="GET" action="{{ route('events.index') }}" class="flex flex-col md:flex-row gap-3">
            <div class="relative flex-grow">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kegiatan, lokasi..." class="w-full px-5 py-3 pl-11 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 outline-none">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
            <select name="category" class="px-4 py-3 border border-gray-300 rounded-full focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-blue-700 transition">Cari</button>
            @if(request()->hasAny(['search','category']))
                <a href="{{ route('events.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-full font-semibold hover:bg-gray-200 transition">Reset</a>
            @endif
        </form>
    </div>
</section>

<section class="py-10">
    <div class="max-w-7xl mx-auto px-4">
        <p class="text-gray-600 mb-6">Menampilkan <span class="font-bold text-blue-600">{{ $events->total() }}</span> kegiatan</p>
        @if($events->isEmpty())
            <div class="text-center py-20">
                <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                <p class="text-2xl font-bold text-gray-500">Tidak ada kegiatan ditemukan</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100 group">
                    <div class="relative h-52 overflow-hidden">
                        @if($event->image_url)
                            <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-emerald-100 flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-6xl text-gray-300"></i>
                            </div>
                        @endif
                        <div class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-xs font-bold">
                            <i class="fas fa-calendar-alt mr-1 text-blue-600"></i>{{ $event->formatted_date }}
                        </div>
                    </div>
                    <div class="p-5">
                        <span class="bg-blue-100 text-blue-700 text-xs font-black px-3 py-1 rounded-full uppercase">{{ $event->category }}</span>
                        <h3 class="text-lg font-bold text-gray-900 mt-3 mb-2 group-hover:text-blue-600 transition line-clamp-2">{{ $event->title }}</h3>
                        <p class="text-gray-500 text-sm mb-3 line-clamp-2">{{ Str::limit($event->description, 100) }}</p>
                        <div class="text-sm text-gray-500 space-y-1 mb-4">
                            <div class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-blue-500 w-4"></i>{{ $event->location }}</div>
                            <div class="flex items-center gap-2"><i class="fas fa-clock text-blue-500 w-4"></i>{{ $event->formatted_time }} WIB</div>
                        </div>
                        <a href="{{ route('events.show', $event) }}" class="block w-full bg-blue-600 text-white py-2.5 rounded-xl text-center font-bold text-sm hover:bg-blue-700 transition shadow-md">
                            <i class="fas fa-eye mr-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">{{ $events->links() }}</div>
        @endif
    </div>
</section>
@endsection