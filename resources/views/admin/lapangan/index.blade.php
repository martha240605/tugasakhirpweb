@extends('layouts.admin') {{-- Meng extends layout admin.blade.php yang baru Anda gunakan --}}

@section('header_title', 'Daftar Lapangan') {{-- Judul untuk header layout --}}

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-3xl text-white leading-tight tracking-wide glow-text mb-8">
            Manajemen Lapangan
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 glass-dark border border-green-500/20">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-100">Daftar Lapangan Olahraga</h3>
                <a href="{{ route('admin.lapangan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <i class="fas fa-plus mr-2"></i> Tambah Lapangan Baru
                </a>
            </div>

            @if(session('success'))
                <div class="green-gradient text-white px-8 py-5 rounded-2xl relative mb-8 shadow-xl hover-glow" role="alert">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold">Success!</h4>
                            <span class="text-sm opacity-90">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Gambar</th>
                            <th scope="col" class="py-3 px-6">Nama Lapangan</th>
                            <th scope="col" class="py-3 px-6">Jenis</th>
                            <th scope="col" class="py-3 px-6">Harga/Jam</th>
                            <th scope="col" class="py-3 px-6">Status</th>
                            <th scope="col" class="py-3 px-6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lapangan as $lapangan)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $lapangan->id }}</th>
                                <td class="py-4 px-6">
                                    @if ($lapangan->gambar)
                                        <img src="{{ asset('storage/' . $lapangan->gambar) }}" alt="{{ $lapangan->nama }}" class="w-16 h-16 object-cover rounded-md">
                                    @else
                                        <span class="text-gray-400">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">{{ $lapangan->nama }}</td>
                                <td class="py-4 px-6">{{ $lapangan->jenis }}</td>
                                <td class="py-4 px-6">Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</td>
                                <td class="py-4 px-6">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold
                                        @if($lapangan->status == 'tersedia') bg-green-200 text-green-800
                                        @else bg-red-200 text-red-800 @endif">
                                        {{ ucfirst($lapangan->status) }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 space-x-2 flex">
                                    <a href="{{ route('admin.lapangan.edit', $lapangan->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.lapangan.destroy', $lapangan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lapangan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="7" class="py-4 px-6 text-center text-gray-500 dark:text-gray-400">Tidak ada data lapangan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection