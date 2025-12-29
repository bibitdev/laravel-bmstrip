@extends('admin.layout')

@section('title', 'Edit Wisata')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h3 class="text-3xl font-bold bg-gradient-to-r from-sky-600 to-cyan-600 bg-clip-text text-transparent mb-2">Edit Wisata</h3>
        <p class="text-gray-600">Perbarui informasi destinasi wisata</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border-2 border-green-200 text-green-700 p-4 rounded-xl mb-6 font-medium">✅ {{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.wisatas.update', $wisata) }}" method="POST" enctype="multipart/form-data" class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-xl border border-sky-100">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Judul Wisata *</label>
                <input type="text" name="title" id="title" value="{{ old('title', $wisata->title) }}" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none" required>
                @error('title')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Slug URL * <span class="text-xs text-gray-500 font-normal">(otomatis dari judul)</span></label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $wisata->slug) }}" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 bg-gray-50 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none" required readonly>
                @error('slug')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2">📷 Gambar Wisata</label>
            @if($wisata->image)
                <div class="mb-3">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    @if(str_starts_with($wisata->image, 'http://') || str_starts_with($wisata->image, 'https://'))
                        {{-- Gambar dari URL internet --}}
                        <img src="{{ $wisata->image }}" alt="{{ $wisata->title }}" class="w-full max-w-md h-48 object-cover rounded-xl border-2 border-sky-100">
                        <p class="text-xs text-gray-500 mt-1">🌐 Gambar dari URL: {{ $wisata->image }}</p>
                    @elseif(file_exists(public_path('uploads/wisata/' . $wisata->image)))
                        {{-- Gambar dari upload lokal --}}
                        <img src="{{ asset('uploads/wisata/' . $wisata->image) }}" alt="{{ $wisata->title }}" class="w-full max-w-md h-48 object-cover rounded-xl border-2 border-sky-100">
                    @else
                        <p class="text-sm text-red-600">⚠️ File gambar tidak ditemukan: {{ $wisata->image }}</p>
                    @endif
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-sky-50 file:text-sky-700 hover:file:bg-sky-100">
            <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG, WEBP. Maksimal 5MB. Kosongkan jika tidak ingin mengubah gambar.</p>
            @error('image')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
            <div id="imagePreview" class="mt-3 hidden">
                <p class="text-sm text-gray-600 mb-2">Preview gambar baru:</p>
                <img src="" alt="Preview" class="w-full max-w-md h-48 object-cover rounded-xl border-2 border-sky-100">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2">Kategori *</label>
            <select name="category_id" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories ?? [] as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id == old('category_id', $wisata->category_id)) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi</label>
            <textarea name="description" rows="8" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none resize-none">{{ old('description', $wisata->description) }}</textarea>
            @error('description')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $wisata->location) }}" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none">
                @error('location')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Harga Tiket (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $wisata->price) }}" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 transition-all outline-none" min="0" step="1">
                @error('price')<div class="text-red-600 text-sm mt-1 font-medium">⚠️ {{ $message }}</div>@enderror
            </div>
        </div>

        <div class="flex items-center justify-between pt-6 border-t-2 border-gray-100">
            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" name="published" value="1" @if(old('published', $wisata->published)) checked @endif class="w-5 h-5 text-sky-600 border-2 border-gray-300 rounded focus:ring-4 focus:ring-sky-100">
                <span class="ml-3 text-sm font-bold text-gray-700">📢 Publikasikan</span>
            </label>

            <div class="flex gap-3">
                <a href="{{ route('admin.wisatas.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all">Batal</a>
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-sky-500 to-cyan-500 text-white rounded-xl font-bold hover:shadow-lg hover:scale-105 transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
// Auto-generate slug from title
document.getElementById('title').addEventListener('input', function(e) {
    const title = e.target.value;
    const slug = title
        .toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/\s+/g, '-')      // Replace spaces with hyphens
        .replace(/-+/g, '-');      // Replace multiple hyphens with single
    document.getElementById('slug').value = slug;
});

// Image preview
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');
    const img = preview.querySelector('img');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
});
</script>
@endsection
