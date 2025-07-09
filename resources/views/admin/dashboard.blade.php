@extends('layouts.admin') {{-- Ini meng extends layout admin.blade.php --}}

@section('header_title', 'Dashboard Admin') {{-- Ini untuk @yield('header_title') di layout --}}

@section('content') {{-- Ini adalah tempat konten utama masuk ke @yield('content') di layout --}}
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        {{-- Jika Anda ingin header terpisah dari layout, letakkan di sini --}}
        <h2 class="font-semibold text-3xl text-white leading-tight tracking-wide glow-text mb-8">
            Overview
        </h2>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 glass-dark border border-green-500/20">
            <p class="text-gray-200">Selamat datang di Panel Administrasi. Pilih opsi dari sidebar untuk mengelola data.</p>

            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                {{-- Card Total Pengguna --}}
                <div class="bg-blue-600 text-white p-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out card-hover">
                    <h3 class="text-lg font-bold mb-2">Total Pengguna</h3>
                    <p class="text-3xl font-extrabold">{{ $totalUsers ?? 0 }}</p>
                    <a href="{{-- rute ke daftar user jika ada --}}" class="mt-4 inline-block text-sm underline hover:no-underline text-blue-200 hover:text-white">Lihat Detail</a>
                </div>

                {{-- Card Total Lapangan --}}
                <div class="bg-purple-600 text-white p-6 rounded-lg shadow-md hover:bg-purple-700 transition duration-300 ease-in-out card-hover">
                    <h3 class="text-lg font-bold mb-2">Total Lapangan</h3>
                    <p class="text-3xl font-extrabold">{{ $totalLapangan ?? 0 }}</p>
                    <a href="{{ route('admin.lapangan.index') }}" class="mt-4 inline-block text-sm underline hover:no-underline text-purple-200 hover:text-white">Lihat Detail</a>
                </div>

                {{-- Card Booking Pending --}}
                <div class="bg-yellow-600 text-white p-6 rounded-lg shadow-md hover:bg-yellow-700 transition duration-300 ease-in-out card-hover">
                    <h3 class="text-lg font-bold mb-2">Booking Pending</h3>
                    <p class="text-3xl font-extrabold">{{ $totalBooking ?? 0 }}</p>
                    <a href="{{ route('admin.booking.index') }}" class="mt-4 inline-block text-sm underline hover:no-underline text-yellow-200 hover:text-white">Lihat Detail</a>
                </div>

                {{-- Card Total Transaksi (Opsional) --}}
                <div class="bg-green-600 text-white p-6 rounded-lg shadow-md hover:bg-green-700 transition duration-300 ease-in-out card-hover">
                    <h3 class="text-lg font-bold mb-2">Total Transaksi</h3>
                    <p class="text-3xl font-extrabold">{{ $totalTransaksi ?? 0 }}</p>
                    <a href="{{ route('admin.transaksi.index') }}" class="mt-4 inline-block text-sm underline hover:no-underline text-green-200 hover:text-white">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
@endsection