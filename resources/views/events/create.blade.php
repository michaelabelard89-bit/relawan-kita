@extends('layouts.app')
@section('title', 'Ajukan Event')
@section('content')
<section class="py-12 px-4">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 py-10 px-8 text-white">
            <h1 class="text-3xl font-bold">Ajukan Kegiatan Relawan</h1>
            <p class="mt-2 text-blue-100">Bantu kami menghubungkan organisasi Anda dengan relawan hebat.</p>
        </div>
        <div class="p-8">
            @if($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-xl">
                    <p class="font-semibold text-red-700 mb-2">Terdapat kesalahan:</p>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('events.store') }}" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Nama Organisasi <span class="text-red-500">*</span></label>
                        <input type="text" name="organizer" value="{{ old('organizer') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Yayasan Peduli Hijau">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select name="category" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach(['Pendidikan','Lingkungan','Kesehatan','Sosial','Olahraga','Lainnya'] as $cat)
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Kegiatan <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Aksi Bersih Pantai & Edukasi Mangrove">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Tanggal <span class="text-red-500">*</span></label>
                        <input type="date" name="event_date" value="{{ old('event_date') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Waktu <span class="text-red-500">*</span></label>
                        <input type="time" name="event_time" value="{{ old('event_time') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi <span class="text-red-500">*</span></label>
                        <input type="text" name="location" value="{{ old('location') }}" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Pantai Ancol, Jakarta">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea name="description" rows="5" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Jelaskan detail kegiatan...">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Persyaratan</label>
                    <textarea name="requirements" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Persyaratan relawan...">{{ old('requirements') }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">URL Gambar (opsional)</label>
                    <input type="url" name="image_url" value="{{ old('image_url') }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none" placeholder="https://example.com/gambar.jpg">
                </div>
                @guest
                    <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-xl text-sm text-yellow-700">
                        <i class="fas fa-info-circle mr-2"></i>
                        Kamu harus <a href="{{ route('login') }}" class="font-bold underline">login</a> terlebih dahulu untuk mengajukan event.
                    </div>
                @endguest
                <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Pengajuan
                </button>
                <p class="text-center text-xs text-gray-400 italic">*Admin akan meninjau pengajuan dalam 1x24 jam.</p>
            </form>
        </div>
    </div>
</section>
@endsection