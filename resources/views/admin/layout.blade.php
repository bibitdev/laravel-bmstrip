<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BmsTrip Admin - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-sky-50 text-gray-800">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white/80 backdrop-blur-sm border-r border-sky-100 shadow-lg">
            <div class="p-6 border-b border-sky-100">
                <a href="{{ route('admin.wisatas.index') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-sky-400 to-cyan-500 rounded-lg flex items-center justify-center text-white font-bold shadow-lg">BT</div>
                    <div>
                        <h1 class="text-lg font-bold bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text text-transparent">BmsTrip</h1>
                        <p class="text-xs text-gray-500">Admin Panel</p>
                    </div>
                </a>
            </div>

            <nav class="px-4 py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.wisatas.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-sky-50 transition-all group">
                            <span class="text-sky-500 group-hover:scale-110 transition-transform">🏠</span>
                            <span class="font-medium text-gray-700 group-hover:text-sky-600">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.wisatas.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-sky-50 transition-all group">
                            <span class="text-cyan-500 group-hover:scale-110 transition-transform">🗺️</span>
                            <span class="font-medium text-gray-700 group-hover:text-cyan-600">Wisata</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-sky-50 transition-all group">
                            <span class="text-teal-500 group-hover:scale-110 transition-transform">📂</span>
                            <span class="font-medium text-gray-700 group-hover:text-teal-600">Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-sky-50 transition-all group">
                            <span class="text-sky-500 group-hover:scale-110 transition-transform">👥</span>
                            <span class="font-medium text-gray-700 group-hover:text-sky-600">Pengguna</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.wisatas.index') }}#reviews" class="flex items-center gap-3 p-2 rounded hover:bg-blue-50">
                            <span class="text-blue-500">💬</span>
                            <span>Review</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Header / Navbar -->
            <header class="bg-white border-b p-4 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <button class="md:hidden text-gray-600">☰</button>
                    <h2 class="text-xl font-semibold">@yield('title', 'Dashboard')</h2>
                </div>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2 px-3 py-2 bg-gradient-to-r from-sky-50 to-cyan-50 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm font-semibold text-gray-700">Admin</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg font-semibold hover:shadow-lg transition-all">Logout</button>
                    </form>
                </div>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
