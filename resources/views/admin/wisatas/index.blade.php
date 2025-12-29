@extends('admin.layout')

@section('title', 'Kelola Wisata')

@section('content')
<!-- Wisata index: list all wisata with actions -->
<div class="space-y-4">
    <!-- Alerts -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between items-center">
        <h3 class="text-2xl font-bold bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text text-transparent">Daftar Wisata</h3>
        <a href="{{ route('admin.wisatas.index') }}" class="bg-gradient-to-r from-sky-500 to-cyan-500 text-white p-2 rounded-lg hover:shadow-lg transition-all" title="Refresh">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>

    <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-sky-100">
        <div class="p-4 border-b border-sky-100 flex items-center gap-3 bg-gradient-to-r from-sky-50 to-cyan-50">
            <a href="{{ route('admin.wisatas.create') }}" class="bg-gradient-to-r from-sky-500 to-cyan-500 text-white px-4 py-2 rounded-lg font-semibold hover:shadow-lg transition-all flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah Wisata
            </a>
        </div>

        <table class="min-w-full divide-y">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Judul</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Kategori</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Lokasi</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Harga</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @forelse($wisatas ?? [] as $wisata)
                    <tr>
                        <td class="px-6 py-3 text-sm">{{ $loop->iteration }}</td>
                        <td class="px-6 py-3 text-sm">{{ $wisata->title }}</td>
                        <td class="px-6 py-3 text-sm">{{ $wisata->category->name ?? '-' }}</td>
                        <td class="px-6 py-3 text-sm">{{ $wisata->location ?? '-' }}</td>
                        <td class="px-6 py-3 text-sm">Rp {{ number_format($wisata->price, 0, ',', '.') }}</td>
                        <td class="px-6 py-3 text-sm">
                            <a href="{{ route('admin.wisatas.edit', $wisata) }}" class="text-sky-600 hover:text-cyan-600 font-medium mr-3 transition-colors">Edit</a>

                            <form action="{{ route('admin.wisatas.destroy', $wisata) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium transition-colors">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-3 text-sm text-gray-500" colspan="6">Belum ada data wisata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{-- Pagination if provided --}}
        {{ $wisatas->links() ?? '' }}
    </div>
</div>
@endsection
