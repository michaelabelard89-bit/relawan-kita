@extends('layouts.app')
@section('title', 'Tentang Kami')
@section('content')
<section class="bg-gradient-to-br from-blue-50 to-emerald-50 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Kisah Kami</h1>
        <p class="text-xl text-gray-600">Membangun jembatan antara individu yang bersemangat dengan komunitas yang membutuhkan.</p>
    </div>
</section>
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&h=600&fit=crop" class="rounded-2xl shadow-lg hover:scale-105 transition duration-300" alt="Tim kami">
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-gray-900">Misi Kami</h2>
                <p class="text-lg text-gray-600">Menghubungkan individu yang peduli dengan peluang sukarelawan yang bermakna untuk menciptakan perubahan positif yang berkelanjutan di masyarakat.</p>
                <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                    <div class="bg-blue-100 p-3 rounded-lg text-blue-600"><i class="fas fa-bullseye text-xl"></i></div>
                    <div><h3 class="font-bold text-gray-900 mb-1">Utamakan Komunitas</h3><p class="text-gray-600 text-sm">Setiap keputusan kami menempatkan kebutuhan komunitas di garis depan.</p></div>
                </div>
                <div class="flex items-start gap-4 p-4 bg-emerald-50 rounded-xl">
                    <div class="bg-emerald-100 p-3 rounded-lg text-emerald-600"><i class="fas fa-rocket text-xl"></i></div>
                    <div><h3 class="font-bold text-gray-900 mb-1">Memberdayakan Perubahan</h3><p class="text-gray-600 text-sm">Kami menyediakan alat dan sumber daya untuk memperkuat dampak nyata Anda.</p></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection