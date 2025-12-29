@extends('layouts.app')

@section('title', $wisata->title ?? 'Detail Wisata')

@section('content')
<!-- =============== BREADCRUMB =============== -->
<div class="mb-8 flex items-center gap-2 text-sm">
    <a href="{{ route('home') }}" class="text-gray-600 hover:text-sky-600 transition font-medium">Beranda</a>
    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <a href="{{ route('wisatas.index') }}" class="text-gray-600 hover:text-sky-600 transition font-medium">Wisata</a>
    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <span class="text-gray-900 font-semibold">{{ $wisata->title }}</span>
</div>

<!-- =============== MAIN CONTENT LAYOUT =============== -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- =============== LEFT COLUMN: IMAGES & DESCRIPTION =============== -->
    <div class="lg:col-span-2 space-y-8">

        <!-- Main Image -->
        <div class="glass rounded-3xl overflow-hidden shadow-2xl group">
            <div class="relative aspect-video bg-gradient-to-br from-gray-200 to-gray-300">
                @if($wisata->image)
                    @if(str_starts_with($wisata->image, 'http://') || str_starts_with($wisata->image, 'https://'))
                        {{-- Gambar dari URL internet --}}
                        <img
                            src="{{ $wisata->image }}"
                            alt="{{ $wisata->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >
                    @elseif(file_exists(public_path('uploads/wisata/' . $wisata->image)))
                        {{-- Gambar dari upload lokal --}}
                        <img
                            src="{{ asset('uploads/wisata/' . $wisata->image) }}"
                            alt="{{ $wisata->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >
                    @else
                        {{-- Gambar default jika file tidak ditemukan --}}
                        <img
                            src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80&auto=format&fit=crop"
                            alt="{{ $wisata->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                        >
                    @endif
                @else
                    {{-- Gambar default jika tidak ada gambar --}}
                    <img
                        src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=1200&q=80&auto=format&fit=crop"
                        alt="{{ $wisata->title }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    >
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>

                <!-- Category Badge -->
                @if($wisata->category)
                    <div class="absolute top-6 left-6 glass px-4 py-2 rounded-full text-sm font-bold text-white shadow-xl">
                        {{ $wisata->category->name }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Wisata Header Info -->
        <div class="glass rounded-3xl p-8 shadow-lg">
            <div class="flex flex-col md:flex-row md:items-start justify-between gap-6 mb-6">
                <div class="flex-1">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $wisata->title }}</h1>
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="font-medium">{{ $wisata->location ?? 'Lokasi tidak tersedia' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span class="font-medium">{{ $wisata->category->name ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rating Summary -->
            @php
                $avgRating = $wisata->reviews ? round($wisata->reviews()->avg('rating'), 1) : 0;
                $reviewCount = $wisata->reviews ? $wisata->reviews()->count() : 0;
            @endphp
            <div class="flex items-center gap-4 p-6 bg-gradient-to-r from-sky-50 to-cyan-50 rounded-2xl">
                <div class="flex gap-1">
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="w-8 h-8 {{ $i <= $avgRating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                    @endfor
                </div>
                <div>
                    <div class="text-3xl font-extrabold text-gray-900">{{ $avgRating }}</div>
                    <div class="text-sm text-gray-600 font-medium">dari {{ $reviewCount }} ulasan</div>
                </div>
            </div>
        </div>

        <!-- Description -->
        <div class="glass rounded-3xl p-8 shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                Tentang Destinasi Ini
            </h3>
            <div class="text-gray-700 leading-relaxed space-y-4 text-lg">
                {!! nl2br(e($wisata->description ?? 'Deskripsi belum tersedia.')) !!}
            </div>
        </div>

        <!-- =============== REVIEWS SECTION =============== -->
        <div class="glass rounded-3xl p-8 shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-sky-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                Ulasan Pengunjung
            </h3>

            @if($wisata->reviews && $wisata->reviews()->count() > 0)
                <!-- Reviews List -->
                <div class="space-y-6 mb-8">
                    @foreach($wisata->reviews()->latest()->get() as $review)
                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                            <!-- Reviewer Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-sky-400 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                                        {{ substr($review->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $review->user->name ?? 'Pengguna' }}</div>
                                        <div class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 bg-gradient-to-r from-yellow-50 to-orange-50 px-3 py-1.5 rounded-full">
                                    <div class="flex">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        @endfor
                                    </div>
                                    <span class="font-bold text-gray-900 text-sm">{{ $review->rating }}/5</span>
                                </div>
                            </div>

                            <!-- Review Comment -->
                            <p class="text-gray-700 leading-relaxed">{{ $review->comment ?? '(Tidak ada komentar)' }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gradient-to-r from-sky-50 to-cyan-50 p-12 rounded-2xl text-center mb-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-sky-100 to-cyan-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-700 font-semibold text-lg">Belum ada ulasan</p>
                    <p class="text-gray-500 mt-2">Jadilah yang pertama memberikan ulasan untuk destinasi ini!</p>
                </div>
            @endif

            <!-- =============== REVIEW FORM (Auth Only) =============== -->
            <div class="border-t border-gray-200 pt-8">
                @auth
                    <h4 class="font-bold text-gray-900 mb-6 text-lg">✍️ Tulis Ulasan Anda</h4>
                    <form action="{{ route('reviews.store', $wisata->id) }}" method="POST" class="space-y-5">
                        @csrf

                        <!-- Rating Select -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">Rating</label>
                            <select name="rating" required class="w-full md:w-64 rounded-xl border-2 border-gray-200 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition font-medium">
                                <option value="">Pilih Rating...</option>
                                <option value="5">⭐⭐⭐⭐⭐ Sangat Bagus (5)</option>
                                <option value="4">⭐⭐⭐⭐ Bagus (4)</option>
                                <option value="3">⭐⭐⭐ Cukup (3)</option>
                                <option value="2">⭐⭐ Kurang (2)</option>
                                <option value="1">⭐ Buruk (1)</option>
                            </select>
                            @error('rating')
                                <div class="text-red-600 text-sm mt-2 font-medium">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Comment Textarea -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">Komentar</label>
                            <textarea
                                name="comment"
                                rows="5"
                                placeholder="Bagikan pengalaman Anda di tempat wisata ini... Apa yang paling Anda suka? Ada tips untuk pengunjung lain?"
                                class="w-full rounded-xl border-2 border-gray-200 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition resize-none"
                            ></textarea>
                            @error('comment')
                                <div class="text-red-600 text-sm mt-2 font-medium">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="btn-ripple inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 text-white px-8 py-3 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Kirim Ulasan
                            </button>
                        </div>
                    </form>
                @else
                    <div class="bg-gradient-to-r from-sky-50 to-cyan-50 border-2 border-sky-200 p-6 rounded-2xl">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-sky-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-900 font-bold mb-2">Login untuk memberikan ulasan</p>
                                <p class="text-gray-700 mb-4">
                                    <a href="{{ route('login') }}" class="font-bold text-sky-600 hover:text-sky-700 hover:underline">Masuk</a>
                                    atau
                                    <a href="{{ route('register') }}" class="font-bold text-sky-600 hover:text-sky-700 hover:underline">Daftar</a>
                                    untuk berbagi pengalaman Anda di destinasi ini.
                                </p>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- =============== RIGHT COLUMN: SIDEBAR =============== -->
    <aside class="lg:col-span-1 space-y-6">

        <!-- =============== INFO BOX =============== -->
        <div class="glass rounded-3xl p-6 shadow-lg sticky top-24">
            <h4 class="text-xl font-bold text-gray-900 mb-6">💳 Informasi Tiket</h4>

            <!-- Price -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="text-sm text-gray-600 mb-2 font-medium">Harga Tiket Masuk</div>
                <div class="text-4xl font-extrabold bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text text-transparent">
                    @if($wisata->price > 0)
                        Rp {{ number_format($wisata->price, 0, ',', '.') }}
                    @else
                        <span class="text-green-600">Gratis</span>
                    @endif
                </div>
                <div class="text-xs text-gray-500 mt-1">per orang</div>
            </div>

            <!-- Opening Hours -->
            <div class="mb-6 pb-6 border-b border-gray-200">
                <div class="text-sm text-gray-600 mb-2 font-medium">Jam Operasional</div>
                <div class="font-bold text-gray-900 text-lg">{{ $wisata->opening_hours ?? '08:00 - 17:00' }}</div>
                <div class="text-xs text-gray-500 mt-1">Setiap hari</div>
            </div>

            <!-- Contact -->
            <div class="mb-6">
                <div class="text-sm text-gray-600 mb-2 font-medium">Kontak Informasi</div>
                <div class="flex items-center gap-2 text-gray-900 font-semibold">
                    <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    +62 812-3456-7890
                </div>
            </div>

            <!-- CTA Button -->
            <button onclick="alert('Fitur pembelian tiket online segera hadir! 🎫')" class="btn-ripple w-full bg-gradient-to-r from-sky-500 to-cyan-600 text-white px-4 py-4 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                <span class="flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                    </svg>
                    Beli Tiket Online
                </span>
            </button>

            <!-- Share Buttons -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="text-sm font-bold text-gray-900 mb-3">Bagikan ke:</div>
                <div class="flex gap-2">
                    <button class="flex-1 bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition font-semibold text-sm">
                        Facebook
                    </button>
                    <button class="flex-1 bg-blue-400 text-white py-2 rounded-xl hover:bg-blue-500 transition font-semibold text-sm">
                        Twitter
                    </button>
                    <button class="flex-1 bg-green-600 text-white py-2 rounded-xl hover:bg-green-700 transition font-semibold text-sm">
                        WhatsApp
                    </button>
                </div>
            </div>
        </div>

        <!-- =============== RECOMMENDATIONS =============== -->
        @if($recommendations && $recommendations->count() > 0)
            <div class="glass rounded-3xl p-6 shadow-lg">
                <h4 class="font-bold text-gray-900 mb-6 text-lg">✨ Rekomendasi Lainnya</h4>
                <div class="space-y-4">
                    @foreach($recommendations as $rec)
                        <a href="{{ route('wisatas.show', $rec->slug) }}" class="flex items-center gap-3 p-3 rounded-2xl hover:bg-gradient-to-r hover:from-sky-50 hover:to-cyan-50 transition-all group">
                            <div class="w-20 h-16 bg-gray-200 overflow-hidden rounded-xl flex-shrink-0">
                                <img
                                    src="{{ $rec->image ?? 'https://images.unsplash.com/photo-1469022563149-aa64dbd37dae?w=200&q=80&auto=format&fit=crop' }}"
                                    alt="{{ $rec->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                >
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-bold text-gray-900 line-clamp-2 group-hover:text-sky-600 transition">{{ $rec->title }}</div>
                                <div class="text-xs text-gray-500 mt-1">{{ $rec->location ?? '-' }}</div>
                                @php
                                    $recRating = $rec->reviews ? round($rec->reviews()->avg('rating'), 1) : 0;
                                @endphp
                                <div class="flex items-center gap-1 mt-1">
                                    <span class="text-yellow-400 text-xs">★</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $recRating }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </aside>
</div>
@endsection
