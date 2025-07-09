{{-- resources/views/user/dashboard.blade.php --}}

<x-app-layout>
    {{-- Ini adalah slot 'header' untuk layout app.blade.php --}}
    {{-- Variabel $header di layouts/app.blade.php akan terisi dari sini --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pengguna') }}
        </h2>
    </x-slot>

    {{-- Ini adalah konten utama yang akan masuk ke variabel $slot di layout app.blade.php --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Selamat Datang di Dashboard Pengguna!</h1>
                    <p class="text-gray-700 dark:text-gray-300">Halo, {{ Auth::user()->name ?? 'Pengguna' }}!</p>
                    <p class="text-gray-700 dark:text-gray-300 mt-2">Ini adalah halaman utama untuk pengguna yang sudah login.</p>

                    {{-- Bagian untuk menampilkan daftar lapangan --}}
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mt-8 mb-4">Lapangan Tersedia</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($lapangans as $lapangan)
                            <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden p-4">
                                @if ($lapangan->gambar)
                                    <img src="{{ asset('storage/' . $lapangan->gambar) }}" alt="{{ $lapangan->nama }}" class="w-full h-40 object-cover rounded-md mb-3">
                                @else
                                    <img src="https://via.placeholder.com/640x360?text=No+Image" alt="No Image" class="w-full h-40 object-cover rounded-md mb-3">
                                @endif
                                <h4 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-1">{{ $lapangan->nama }} ({{ $lapangan->jenis }})</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-2">{{ Str::limit($lapangan->deskripsi, 80) }}</p>
                                <p class="text-green-600 dark:text-green-400 font-semibold">Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}/jam</p>
                                {{-- Ganti route ini dengan route ke halaman detail lapangan pengguna --}}
                                </div>
                        @empty
                            <div class="col-span-full text-center text-gray-500 dark:text-gray-400 py-10">
                                <p>Belum ada lapangan yang tersedia saat ini.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        {{ $lapangans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>