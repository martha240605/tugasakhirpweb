@extends('layouts.admin') {{-- Meng extends layout admin.blade.php Anda --}}

@section('header_title', 'Edit Lapangan: ' . $lapangan->nama) {{-- Judul dinamis --}}

@section('content')
    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl text-white leading-tight tracking-wide glow-text mb-8 text-center">
            Edit Lapangan: <span class="gradient-text">{{ $lapangan->nama }}</span>
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-8 glass-dark border border-green-500/20">
            {{-- Form untuk mengedit lapangan --}}
            {{-- Penting: method PUT dan enctype untuk upload file --}}
            <form action="{{ route('admin.lapangan.update', $lapangan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Digunakan untuk request UPDATE --}}

                {{-- Nama Lapangan --}}
                <div class="mb-5">
                    <label for="nama" class="block text-sm font-medium text-gray-200 mb-2">Nama Lapangan</label>
                    <input type="text" name="nama" id="nama" class="form-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:ring-green-500 focus:border-green-500 transition duration-150" value="{{ old('nama', $lapangan->nama) }}" required>
                    @error('nama')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Jenis Lapangan --}}
                <div class="mb-5">
                    <label for="jenis" class="block text-sm font-medium text-gray-200 mb-2">Jenis Lapangan</label>
                    <select name="jenis" id="jenis" class="form-select w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-green-500 focus:border-green-500 transition duration-150" required>
                        <option value="">Pilih Jenis Lapangan</option>
                        <option value="Badminton" {{ old('jenis', $lapangan->jenis) == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                        <option value="Futsal" {{ old('jenis', $lapangan->jenis) == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                        <option value="Voli" {{ old('jenis', $lapangan->jenis) == 'Voli' ? 'selected' : '' }}>Voli</option>
                        <option value="Tenis" {{ old('jenis', $lapangan->jenis) == 'Tenis' ? 'selected' : '' }}>Tenis</option>
                        <option value="Basket" {{ old('jenis', $lapangan->jenis) == 'Basket' ? 'selected' : '' }}>Basket</option>
                    </select>
                    @error('jenis')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Harga per Jam --}}
                <div class="mb-5">
                    <label for="harga_per_jam" class="block text-sm font-medium text-gray-200 mb-2">Harga per Jam (Rp)</label>
                    <input type="number" name="harga_per_jam" id="harga_per_jam" class="form-input w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:ring-green-500 focus:border-green-500 transition duration-150" value="{{ old('harga_per_jam', $lapangan->harga_per_jam) }}" required min="0">
                    @error('harga_per_jam')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <div class="mb-5">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-200 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-textarea w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white placeholder-gray-400 focus:ring-green-500 focus:border-green-500 transition duration-150">{{ old('deskripsi', $lapangan->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Gambar Lapangan --}}
                <div class="mb-5">
                    <label for="gambar" class="block text-sm font-medium text-gray-200 mb-2">Gambar Lapangan</label>
                    @if ($lapangan->gambar)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $lapangan->gambar) }}" alt="Gambar Lapangan Saat Ini" class="w-32 h-32 object-cover rounded-md shadow-lg border border-gray-600">
                            <p class="text-xs text-gray-400 mt-1">Gambar saat ini.</p>
                        </div>
                    @endif
                    <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-300
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-green-500 file:text-white
                        hover:file:bg-green-600
                        cursor-pointer">
                    @error('gambar')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-400">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                </div>

                {{-- Status Lapangan --}}
                <div class="mb-6">
                    <label for="status" class="block text-sm font-medium text-gray-200 mb-2">Status</label>
                    <select name="status" id="status" class="form-select w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:ring-green-500 focus:border-green-500 transition duration-150" required>
                        <option value="Tersedia" {{ old('status', $lapangan->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Disewa" {{ old('status', $lapangan->status) == 'Disewa' ? 'selected' : '' }}>Disewa</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.lapangan.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-600 rounded-md font-semibold text-sm text-gray-300 uppercase tracking-widest bg-gray-700 hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150">
                        Batal
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-green-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Update Lapangan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection