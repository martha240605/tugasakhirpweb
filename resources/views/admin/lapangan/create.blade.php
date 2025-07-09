@extends('layouts.admin')

@section('title', 'Tambah Lapangan')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4 text-white">Tambah Lapangan</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.lapangan.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-gray-800 text-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block font-semibold mb-1">Nama Lapangan</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="jenis" class="block font-semibold mb-1">Jenis Lapangan</label>
            <input type="text" name="jenis" id="jenis" value="{{ old('jenis') }}"
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="harga_per_jam" class="block font-semibold mb-1">Harga Per Jam</label>
            <input type="number" name="harga_per_jam" id="harga_per_jam" value="{{ old('harga_per_jam') }}"
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label for="status" class="block font-semibold mb-1">Status</label>
            <select name="status" id="status"
                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ old('status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

         <!-- Upload Gambar -->
    <div class="mb-6">
        <label for="gambar" class="block font-semibold mb-1">Upload Gambar Lapangan</label>
        <input type="file" name="gambar" id="gambar"
            class="w-full bg-gray-700 border border-gray-600 text-white file:bg-blue-600 file:text-white file:border-none file:px-4 file:py-2 file:rounded cursor-pointer"
            accept="image/*">
        @error('gambar')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.lapangan.index') }}" class="text-gray-300 hover:text-white">← Kembali</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
