<!doctype html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BmsTrip - @yield('title', 'Jelajah Banyumas')</title>

    <!-- Google Fonts: Inter & Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN - Langsung Jalan -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'Poppins', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Tailwind compiled CSS (dari Vite) - Backup -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Modern CSS Variables */
        :root {
            --gradient-start: #0EA5E9;
            --gradient-end: #06B6D4;
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            font-size: 16px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Inter', 'Poppins', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
            color: var(--text-primary);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Smooth Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #0EA5E9, #06B6D4);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #06B6D4, #0EA5E9);
        }

        /* Animated Background Pattern */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(14, 165, 233, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(6, 182, 212, 0.05) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Loading Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #0EA5E9 0%, #06B6D4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Glass Morphism */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Hover Scale */
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.15);
        }

        /* Button Ripple Effect */
        .btn-ripple {
            position: relative;
            overflow: hidden;
        }

        .btn-ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-ripple:active::after {
            width: 300px;
            height: 300px;
        }

        /* Mobile Menu Animation */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }
    </style>
</head>
<body class="relative">

    <!-- =============== HEADER / NAVBAR =============== -->
    <header class="glass sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-sky-500 via-cyan-500 to-teal-500 rounded-2xl flex items-center justify-center text-white font-bold text-lg shadow-xl transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        🏖️
                    </div>
                    <div class="hidden sm:block">
                        <div class="text-xl font-extrabold gradient-text tracking-tight">BmsTrip</div>
                        <div class="text-xs text-gray-600 font-semibold">Jelajah Banyumas</div>
                    </div>
                </a>

                <!-- Navigation Links - Desktop -->
                <nav class="hidden lg:flex items-center gap-2">
                    <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-semibold rounded-xl transition-all duration-200 {{ request()->routeIs('home') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white shadow-lg' : 'text-gray-700 hover:text-sky-600 hover:bg-sky-50' }}">
                        🏠 Beranda
                    </a>
                    <a href="{{ route('wisatas.index') }}" class="px-4 py-2 text-sm font-semibold rounded-xl transition-all duration-200 {{ request()->routeIs('wisatas.*') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white shadow-lg' : 'text-gray-700 hover:text-sky-600 hover:bg-sky-50' }}">
                        🗺️ Semua Wisata
                    </a>
                    <a href="{{ route('tentang') }}" class="px-4 py-2 text-sm font-semibold rounded-xl transition-all duration-200 {{ request()->routeIs('tentang') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white shadow-lg' : 'text-gray-700 hover:text-sky-600 hover:bg-sky-50' }}">
                        ℹ️ Tentang
                    </a>
                </nav>

                <!-- Auth Links / User Menu -->
                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-sky-600 hover:text-sky-700 hover:bg-sky-50 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="btn-ripple inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-cyan-600 text-white px-5 py-2.5 rounded-xl font-bold hover:from-sky-600 hover:to-cyan-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar Gratis
                        </a>
                    @else
                        <div class="flex items-center gap-3">
                            <!-- User Name with Avatar -->
                            <div class="hidden md:flex items-center gap-2 px-3 py-2 bg-gradient-to-r from-sky-50 to-cyan-50 rounded-xl">
                                <div class="w-8 h-8 bg-gradient-to-br from-sky-400 to-cyan-500 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                    {{ substr(auth()->user()->name, 0, 2) }}
                                </div>
                                <span class="text-sm font-semibold text-gray-700">{{ auth()->user()->name }}</span>
                            </div>

                            <!-- Admin Dashboard Button (if admin) -->
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ url('/admin/wisatas') }}" class="btn-ripple inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-xl font-bold hover:from-amber-600 hover:to-orange-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="hidden sm:inline">Admin Panel</span>
                                </a>
                            @endif

                            <!-- Logout Button -->
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-red-600 hover:text-red-700 hover:bg-red-50 rounded-xl transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span class="hidden sm:inline">Keluar</span>
                                </button>
                            </form>
                        </div>
                    @endguest

                    <!-- Mobile Menu Button -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-gray-600 hover:text-sky-600 hover:bg-sky-50 rounded-xl transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu lg:hidden fixed inset-y-0 left-0 w-72 glass shadow-2xl z-50 p-6">
            <div class="flex justify-between items-center mb-8">
                <div class="text-xl font-bold gradient-text">Menu</div>
                <button onclick="toggleMobileMenu()" class="p-2 hover:bg-gray-100 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <nav class="space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('home') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white' : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    🏠 Beranda
                </a>
                <a href="{{ route('wisatas.index') }}" class="block px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('wisatas.*') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white' : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    🗺️ Semua Wisata
                </a>
                <a href="{{ route('tentang') }}" class="block px-4 py-3 rounded-xl font-semibold transition {{ request()->routeIs('tentang') ? 'bg-gradient-to-r from-sky-500 to-cyan-600 text-white' : 'text-gray-700 hover:bg-sky-50 hover:text-sky-600' }}">
                    ℹ️ Tentang
                </a>
            </nav>
        </div>
        <div id="mobileMenuOverlay" class="hidden fixed inset-0 bg-black/50 z-40 lg:hidden" onclick="toggleMobileMenu()"></div>
    </header>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const overlay = document.getElementById('mobileMenuOverlay');
            menu.classList.toggle('active');
            overlay.classList.toggle('hidden');
        }
    </script>

    <!-- =============== MAIN CONTENT =============== -->
    <main class="relative z-10 py-8 md:py-12 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="animate-fade-in-up">
                @yield('content')
            </div>
        </div>
    </main>

    <!-- =============== FOOTER =============== -->
    <footer class="relative z-10 glass border-t mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- Brand Section -->
                <div class="md:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-sky-500 via-cyan-500 to-teal-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                            🏖️
                        </div>
                        <div class="text-lg font-bold gradient-text">BmsTrip</div>
                    </div>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Platform rekomendasi destinasi wisata terbaik di Banyumas. Temukan, jelajahi, dan nikmati pengalaman wisata yang tak terlupakan.
                    </p>
                    <div class="flex gap-3 mt-4">
                        <a href="#" class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white hover:scale-110 transition-transform shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-lg flex items-center justify-center text-white hover:scale-110 transition-transform shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-gradient-to-br from-blue-400 to-blue-500 rounded-lg flex items-center justify-center text-white hover:scale-110 transition-transform shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Beranda</a></li>
                        <li><a href="{{ route('wisatas.index') }}" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Semua Wisata</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Kategori</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Tentang Kami</a></li>
                    </ul>
                </div>

                <!-- Support -->
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Bantuan</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Kontak</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-sky-600 hover:translate-x-1 inline-block transition-all">Syarat & Ketentuan</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-bold text-gray-900 mb-4 text-sm uppercase tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-3 text-sm text-gray-600">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Banyumas, Jawa Tengah, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span>info@bmstrip.com</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-sky-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+62 812-3456-7890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-600">
                    © {{ date('Y') }} <span class="font-bold gradient-text">BmsTrip</span>. All rights reserved.
                </p>
                <p class="text-xs text-gray-500">
                    Banyumas Tourism 2025
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
