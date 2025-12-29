@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- =============== HERO SECTION =============== -->
<section class="relative mb-16 -mt-4">
    <div class="glass rounded-3xl overflow-hidden shadow-2xl">
        <div class="relative bg-gradient-to-br from-sky-600 via-cyan-600 to-teal-500 text-white">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00em0wIDI0YzAtMi4yMSAxLjc5LTQgNC00czQgMS43OSA0IDQtMS43OSA0LTQgNC00LTEuNzktNC00ek0xMiAxNmMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHptMCAyNGMwLTIuMjEgMS43OS00IDQtNHM0IDEuNzkgNCA0LTEuNzkgNC00IDQtNC0xLjc5LTQtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"></div>

            <div class="relative z-10 grid lg:grid-cols-2 gap-12 items-center p-8 md:p-12 lg:p-16">
                <!-- Left: Hero Text & Search -->
                <div class="space-y-6">
                    <!-- Badge -->
                    <div class="inline-flex items-center gap-2 glass text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                        <span class="animate-pulse">✨</span>
                        Platform Wisata Terpercaya
                    </div>

                    <!-- Heading -->
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight">
                        Temukan Wisata <span class="block text-yellow-300 mt-2">Terbaik</span> di Banyumas
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-lg md:text-xl text-white/90 leading-relaxed">
                        Jelajahi destinasi wisata pilihan, baca ulasan pengguna, dan rencanakan perjalanan impianmu ke Banyumas.
                    </p>

                    <!-- Search Form -->
                    <form action="{{ route('home') }}" method="GET" class="space-y-3">
                        <div class="flex flex-col sm:flex-row gap-3">
                            <div class="flex-1 relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input
                                    type="text"
                                    name="q"
                                    value="{{ request('q', '') }}"
                                    placeholder="Cari tempat, lokasi, atau kategori..."
                                    class="w-full pl-12 pr-4 py-4 rounded-2xl text-gray-800 placeholder-gray-500 focus:outline-none focus:ring-4 focus:ring-white/30 transition shadow-xl font-medium"
                                >
                            </div>
                            <button type="submit" class="btn-ripple bg-white text-sky-600 px-8 py-4 rounded-2xl font-bold hover:bg-gray-50 transition shadow-xl whitespace-nowrap transform hover:scale-105">
                                🔍 Cari Sekarang
                            </button>
                        </div>
                    </form>

                    <!-- Popular Categories Pills -->
                    <div class="flex gap-3 flex-wrap items-center">
                        <span class="text-white/80 text-sm font-semibold">Populer:</span>
                        @forelse($categories as $cat)
                            <a href="{{ route('home', ['category' => $cat->slug]) }}" class="glass px-4 py-2 hover:bg-white/30 text-white rounded-full text-sm font-semibold transition-all transform hover:scale-105 shadow-lg">
                                {{ $cat->name }}
                            </a>
                        @empty
                            <a href="{{ route('home', ['category' => 'alam']) }}" class="glass px-4 py-2 hover:bg-white/30 text-white rounded-full text-sm font-semibold transition-all transform hover:scale-105 shadow-lg">🏞️ Alam</a>
                            <a href="{{ route('home', ['category' => 'kuliner']) }}" class="glass px-4 py-2 hover:bg-white/30 text-white rounded-full text-sm font-semibold transition-all transform hover:scale-105 shadow-lg">🍜 Kuliner</a>
                        @endforelse
                    </div>
                </div>

                <!-- Right: Hero Image -->
                <div class="hidden lg:block relative">
                    <div class="relative aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl transform hover:scale-105 transition-transform duration-500">
                        <img
                            src="{{ asset('assets/images/menara.jpg') }}"
                            alt="Destinasi Wisata Banyumas"
                            class="w-full h-full object-cover"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                            <div class="glass rounded-2xl p-4 shadow-xl">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-cyan-500 rounded-xl flex items-center justify-center text-2xl shadow-lg">
                                        🏔️
                                    </div>
                                    <div>
                                        <div class="font-bold text-xl">Baturraden</div>
                                        <div class="text-sm text-white/80">Wisata Alam Terfavorit</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="text-yellow-400">★★★★★</span>
                                    <span class="font-semibold">4.8</span>
                                    <span class="text-white/60">(256 review)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Stats Cards -->
                    <div class="absolute -top-4 -right-4 glass rounded-2xl p-4 shadow-xl text-white transform hover:scale-110 transition-transform">
                        <div class="text-3xl font-bold gradient-text bg-white">50+</div>
                        <div class="text-sm text-white/80 font-semibold">Destinasi</div>
                    </div>
                    {{-- <div class="absolute top-1/2 -left-4 glass rounded-2xl p-4 shadow-xl text-white transform hover:scale-110 transition-transform">
                        <div class="text-3xl font-bold gradient-text bg-white">10K+</div>
                        <div class="text-sm text-white/80 font-semibold">Pengunjung</div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =============== LATEST WISATA GRID =============== -->
<section class="mb-16">
    <div class="flex flex-col md:flex-row items-start md:items-end justify-between mb-10 gap-4">
        <div>
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-100 to-cyan-100 px-4 py-2 rounded-full text-sky-600 font-bold text-sm mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                Rekomendasi Terbaik
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-3">
                Wisata <span class="gradient-text">Terbaru</span>
            </h2>
            <p class="text-gray-600 text-lg">Destinasi pilihan dan rekomendasi terpopuler dari pengguna BmsTrip</p>
        </div>
        <a href="{{ route('wisatas.index') }}" class="btn-ripple inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 text-white px-6 py-3 rounded-2xl font-bold hover:from-sky-600 hover:to-cyan-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
            Lihat Semua
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>

    <!-- Cards Grid: responsive 1 column mobile, 2 tablet, 3 desktop -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
        @forelse($wisatas ?? [] as $w)
            <div class="glass rounded-3xl overflow-hidden hover-scale group shadow-lg">
                <!-- Image Container -->
                <a href="{{ route('wisatas.show', $w->slug) }}" class="block relative overflow-hidden h-56 bg-gradient-to-br from-gray-200 to-gray-300">
                    @if($w->image)
                        @if(str_starts_with($w->image, 'http://') || str_starts_with($w->image, 'https://'))
                            {{-- Gambar dari URL internet --}}
                            <img
                                src="{{ $w->image }}"
                                alt="{{ $w->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            >
                        @elseif(file_exists(public_path('uploads/wisata/' . $w->image)))
                            {{-- Gambar dari upload lokal --}}
                            <img
                                src="{{ asset('uploads/wisata/' . $w->image) }}"
                                alt="{{ $w->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            >
                        @else
                            {{-- Gambar default jika file tidak ditemukan --}}
                            <img
                                src="https://images.unsplash.com/photo-1469022563149-aa64dbd37dae?w=600&q=80&auto=format&fit=crop"
                                alt="{{ $w->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                            >
                        @endif
                    @else
                        {{-- Gambar default jika tidak ada gambar --}}
                        <img
                            src="https://images.unsplash.com/photo-1469022563149-aa64dbd37dae?w=600&q=80&auto=format&fit=crop"
                            alt="{{ $w->title }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        >
                    @endif
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <!-- Category Badge -->
                    @if($w->category)
                        <div class="absolute top-4 left-4 glass px-3 py-1.5 rounded-full text-xs font-bold shadow-lg text-white">
                            {{ $w->category->name }}
                        </div>
                    @endif

                    <!-- Quick View -->
                    <div class="absolute bottom-4 left-4 right-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                        <button class="w-full glass text-white backdrop-blur-md font-bold py-2.5 rounded-xl hover:bg-white/30 transition shadow-lg">
                            👁️ Lihat Detail
                        </button>
                    </div>
                </a>

                <!-- Content -->
                <div class="p-6 flex flex-col">
                    <!-- Title -->
                    <a href="{{ route('wisatas.show', $w->slug) }}" class="font-bold text-xl text-gray-900 hover:text-sky-600 transition line-clamp-2 mb-3 group-hover:text-sky-600">
                        {{ $w->title }}
                    </a>

                    <!-- Location -->
                    <div class="flex items-center gap-2 text-gray-600 mb-4 text-sm">
                        <svg class="w-4 h-4 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="truncate">{{ $w->location ?? 'Lokasi belum tersedia' }}</span>
                    </div>

                    <!-- Stats Row -->
                    <div class="flex items-center justify-between mb-5 pb-5 border-b border-gray-200">
                        <div class="flex items-center gap-2">
                            @php
                                $avgRating = $w->reviews ? round($w->reviews()->avg('rating'), 1) : 0;
                                $reviewCount = $w->reviews ? $w->reviews()->count() : 0;
                            @endphp
                            <div class="flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                            </div>
                            <span class="font-bold text-gray-900">{{ $avgRating }}</span>
                            <span class="text-gray-500 text-xs">({{ $reviewCount }})</span>
                        </div>
                        <div class="text-sky-600 font-bold text-lg">
                            @if($w->price > 0)
                                Rp {{ number_format($w->price, 0, ',', '.') }}
                            @else
                                <span class="text-green-600">Gratis</span>
                            @endif
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="{{ route('wisatas.show', $w->slug) }}" class="btn-ripple w-full bg-gradient-to-r from-sky-500 to-cyan-600 text-white font-bold px-4 py-3 rounded-xl hover:from-sky-600 hover:to-cyan-700 transition-all text-center shadow-md hover:shadow-lg transform hover:scale-105">
                        Lihat Detail →
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full glass rounded-3xl p-12 text-center shadow-lg">
                <div class="w-24 h-24 bg-gradient-to-br from-sky-100 to-cyan-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Belum Ada Wisata</h3>
                <p class="text-gray-600 mb-6">Destinasi wisata akan segera ditambahkan. Kembali lagi nanti!</p>
                <a href="{{ route('wisatas.index') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 text-white px-6 py-3 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-700 transition-all shadow-lg">
                    Refresh Halaman
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if(isset($wisatas) && $wisatas->count())
        <div class="mt-12 flex justify-center">
            <div class="glass px-6 py-4 rounded-2xl shadow-lg">
                {{ $wisatas->links() }}
            </div>
        </div>
    @endif
</section>
@endsection
