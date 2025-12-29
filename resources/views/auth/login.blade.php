@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Left: Illustration/Info -->
        <div class="hidden md:block">
            <div class="glass rounded-3xl p-12 shadow-xl bg-gradient-to-br from-sky-500 via-cyan-500 to-teal-500 text-white">
                <div class="mb-8">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-6 shadow-xl">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-extrabold mb-4">Selamat Datang Kembali!</h2>
                    <p class="text-white/90 text-lg leading-relaxed">
                        Masuk untuk melanjutkan petualangan wisata Anda di Banyumas. Akses fitur lengkap dan nikmati pengalaman terbaik.
                    </p>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Simpan destinasi favorit Anda</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Tulis dan bagikan review</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="font-semibold">Dapatkan rekomendasi personal</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right: Login Form -->
        <div class="glass rounded-3xl shadow-xl p-8 md:p-12">
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Masuk ke Akun</h2>
                <p class="text-gray-600">Masukkan email dan password Anda untuk melanjutkan</p>
            </div>

            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-50 border-2 border-red-200 text-red-700 p-4 rounded-2xl mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-sm font-medium flex items-center gap-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-3">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition font-medium"
                            placeholder="user@example.com"
                        >
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-3">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            class="w-full pl-12 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:outline-none focus:ring-4 focus:ring-sky-100 focus:border-sky-500 transition font-medium"
                            placeholder="••••••••"
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="btn-ripple w-full bg-gradient-to-r from-sky-500 to-cyan-600 text-white font-bold py-4 rounded-xl hover:from-sky-600 hover:to-cyan-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105"
                >
                    Masuk Sekarang →
                </button>
            </form>

            {{-- <!-- Demo Accounts Info -->
            <div class="mt-8 pt-8 border-t border-gray-200">
                <p class="text-sm font-bold text-gray-700 mb-4">🎯 Akun Demo untuk Percobaan:</p>
                <div class="space-y-3">
                    <div class="bg-gradient-to-r from-amber-50 to-orange-50 p-4 rounded-xl border border-amber-200">
                        <p class="text-sm font-bold text-gray-900 mb-1">👨‍💼 Admin</p>
                        <p class="text-xs text-gray-600"><strong>Email:</strong> admin@bmstrip.local</p>
                        <p class="text-xs text-gray-600"><strong>Password:</strong> password</p>
                    </div>
                    <div class="bg-gradient-to-r from-sky-50 to-cyan-50 p-4 rounded-xl border border-sky-200">
                        <p class="text-sm font-bold text-gray-900 mb-1">👤 User</p>
                        <p class="text-xs text-gray-600"><strong>Email:</strong> budi@example.com</p>
                        <p class="text-xs text-gray-600"><strong>Password:</strong> password</p>
                    </div>
                </div>
            </div> --}}

            <!-- Link to Register -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="font-bold text-sky-600 hover:text-sky-700 hover:underline">Daftar Gratis →</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
