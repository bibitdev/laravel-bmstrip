@extends('layouts.app')

@section('title', 'Tentang BmsTrip')

@section('content')
<!-- Hero Section -->
<div class="glass rounded-3xl overflow-hidden shadow-2xl mb-12">
    <div class="relative bg-gradient-to-br from-sky-600 via-cyan-600 to-teal-500 text-white p-12 md:p-16">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00em0wIDI0YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00ek0xMiAxNmMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHptMCAyNGMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-20"></div>

        <div class="relative z-10 text-center max-w-4xl mx-auto">
            <div class="inline-flex items-center gap-2 glass px-6 py-3 rounded-full text-white font-bold mb-6 shadow-xl">
                <span class="animate-pulse">✨</span>
                Tentang Kami
            </div>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                Temukan Petualangan <br>di <span class="text-yellow-300">Banyumas</span>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 leading-relaxed">
                BmsTrip adalah platform digital terpercaya untuk menemukan dan menjelajahi destinasi wisata terbaik di Banyumas
            </p>
        </div>
    </div>
</div>

<!-- Visi & Misi -->
<div class="grid md:grid-cols-2 gap-8 mb-12">
    <div class="glass rounded-3xl p-8 shadow-lg hover-scale">
        <div class="w-16 h-16 bg-gradient-to-br from-sky-500 to-cyan-600 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-xl">
            🎯
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Visi Kami</h2>
        <p class="text-gray-700 leading-relaxed text-lg">
            Menjadi platform wisata digital terdepan di Banyumas yang menghubungkan wisatawan dengan destinasi wisata terbaik,
            memberikan pengalaman yang tak terlupakan, dan berkontribusi pada pertumbuhan pariwisata lokal.
        </p>
    </div>

    <div class="glass rounded-3xl p-8 shadow-lg hover-scale">
        <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-2xl flex items-center justify-center text-white text-3xl mb-6 shadow-xl">
            🚀
        </div>
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Misi Kami</h2>
        <ul class="space-y-3 text-gray-700 text-lg">
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold flex-shrink-0">✓</span>
                <span>Menyediakan informasi wisata yang akurat dan terpercaya</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold flex-shrink-0">✓</span>
                <span>Memudahkan wisatawan menemukan destinasi impian</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold flex-shrink-0">✓</span>
                <span>Mendorong pertumbuhan ekonomi pariwisata lokal</span>
            </li>
        </ul>
    </div>
</div>

<!-- Mengapa Memilih BmsTrip -->
<div class="glass rounded-3xl p-12 shadow-xl mb-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Mengapa Memilih BmsTrip?</h2>
        <p class="text-gray-600 text-lg">Platform wisata terlengkap dengan berbagai keunggulan</p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-sky-500 to-cyan-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                📱
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">User-Friendly</h3>
            <p class="text-gray-600 leading-relaxed">
                Interface yang mudah digunakan dan responsif di semua perangkat
            </p>
        </div>

        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                ⭐
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Review Terpercaya</h3>
            <p class="text-gray-600 leading-relaxed">
                Baca ulasan dan rating dari ribuan pengguna yang sudah berkunjung
            </p>
        </div>

        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                🗺️
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">50+ Destinasi</h3>
            <p class="text-gray-600 leading-relaxed">
                Akses ke lebih dari 50+ destinasi wisata terbaik di Banyumas
            </p>
        </div>

        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                💰
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Info Harga Lengkap</h3>
            <p class="text-gray-600 leading-relaxed">
                Dapatkan informasi harga tiket masuk yang akurat dan update
            </p>
        </div>

        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                🔍
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Pencarian Mudah</h3>
            <p class="text-gray-600 leading-relaxed">
                Temukan wisata dengan filter kategori dan lokasi yang praktis
            </p>
        </div>

        <div class="text-center">
            <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center text-white text-4xl mx-auto mb-6 shadow-xl transform hover:scale-110 transition-transform">
                🤝
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-3">Komunitas Aktif</h3>
            <p class="text-gray-600 leading-relaxed">
                Bergabung dengan ribuan traveler dan berbagi pengalaman
            </p>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="glass rounded-3xl p-12 shadow-xl mb-12 bg-gradient-to-br from-sky-50 to-cyan-50">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4">BmsTrip dalam Angka</h2>
        <p class="text-gray-600 text-lg">Pertumbuhan platform kami yang luar biasa</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="text-center">
            <div class="text-5xl md:text-6xl font-extrabold gradient-text mb-3">50+</div>
            <div class="text-gray-700 font-semibold">Destinasi Wisata</div>
        </div>
        <div class="text-center">
            <div class="text-5xl md:text-6xl font-extrabold gradient-text mb-3">10K+</div>
            <div class="text-gray-700 font-semibold">Pengunjung Aktif</div>
        </div>
        <div class="text-center">
            <div class="text-5xl md:text-6xl font-extrabold gradient-text mb-3">5K+</div>
            <div class="text-gray-700 font-semibold">Review & Rating</div>
        </div>
        <div class="text-center">
            <div class="text-5xl md:text-6xl font-extrabold gradient-text mb-3">4.8</div>
            <div class="text-gray-700 font-semibold">Rating Pengguna</div>
        </div>
    </div>
</div>

<!-- Tim Kami -->
<div class="glass rounded-3xl p-12 shadow-xl mb-12">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Tim BmsTrip</h2>
        <p class="text-gray-600 text-lg">Orang-orang hebat di balik platform kami</p>
    </div>

    <div class="grid md:grid-cols-4 gap-8">
        <div class="text-center group">
            <div class="w-32 h-32 bg-gradient-to-br from-sky-400 to-cyan-500 rounded-full flex items-center justify-center text-white text-4xl mx-auto mb-4 shadow-xl group-hover:scale-110 transition-transform">
                👨‍💼
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Founder & CEO</h3>
            <p class="text-gray-600 text-sm">Visioner Platform</p>
        </div>

        <div class="text-center group">
            <div class="w-32 h-32 bg-gradient-to-br from-cyan-400 to-teal-500 rounded-full flex items-center justify-center text-white text-4xl mx-auto mb-4 shadow-xl group-hover:scale-110 transition-transform">
                👩‍💻
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Tech Lead</h3>
            <p class="text-gray-600 text-sm">Inovasi Teknologi</p>
        </div>

        <div class="text-center group">
            <div class="w-32 h-32 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white text-4xl mx-auto mb-4 shadow-xl group-hover:scale-110 transition-transform">
                👨‍🎨
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Design Lead</h3>
            <p class="text-gray-600 text-sm">UX/UI Expert</p>
        </div>

        <div class="text-center group">
            <div class="w-32 h-32 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center text-white text-4xl mx-auto mb-4 shadow-xl group-hover:scale-110 transition-transform">
                👩‍💼
            </div>
            <h3 class="font-bold text-gray-900 mb-1">Marketing Lead</h3>
            <p class="text-gray-600 text-sm">Growth Strategy</p>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="glass rounded-3xl overflow-hidden shadow-2xl">
    <div class="relative bg-gradient-to-r from-sky-600 via-cyan-600 to-teal-500 text-white p-12 md:p-16 text-center">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00em0wIDI0YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00ek0xMiAxNmMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHptMCAyNGMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-20"></div>

        <div class="relative z-10 max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-5xl font-extrabold mb-6">Siap Menjelajahi Banyumas?</h2>
            <p class="text-xl text-white/90 mb-8 leading-relaxed">
                Bergabunglah dengan ribuan traveler lainnya dan mulai petualangan wisata Anda bersama BmsTrip
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('wisatas.index') }}" class="btn-ripple inline-flex items-center justify-center gap-2 bg-white text-sky-600 px-8 py-4 rounded-2xl font-bold hover:bg-gray-100 transition-all shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Jelajahi Wisata
                </a>
                @guest
                <a href="{{ route('register') }}" class="btn-ripple inline-flex items-center justify-center gap-2 glass text-white px-8 py-4 rounded-2xl font-bold hover:bg-white/30 transition-all shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Daftar Gratis
                </a>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection
