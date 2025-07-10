@extends('layouts.admin')

@section('title', 'Laporan Komprehensif')

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Laporan Komprehensif</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">Klik tombol di bawah untuk mengunduh laporan PDF.</p>
<a href="{{ route('admin.laporan.cetak') }}" class="menu-item group flex items-center px-6 py-4 text-gray-300 hover:bg-gradient-to-r hover:from-green-600/80 hover:to-green-700/80 hover:text-white rounded-2xl transition-all duration-300 hover-glow card-hover border border-transparent hover:border-green-500/30">
                            <div class="icon-container w-12 h-12 green-gradient rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <i class="fas fa-print text-white text-lg"></i>
                            </div>
                            <div class="flex-1">
                                <span class="font-semibold text-base">Cetak Laporan</span>
                                <p class="text-xs text-gray-400 group-hover:text-gray-200">Print Reports</p>
                            </div>
                        </a>
    </div>
@endsection
