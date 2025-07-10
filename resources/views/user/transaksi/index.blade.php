<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 -mx-4 -mt-4 px-4 pt-4 pb-6">
            <h2 class="text-2xl font-bold text-white mb-2">
                {{ __('Riwayat Transaksi') }}
            </h2>
            <p class="text-indigo-100 opacity-90">Kelola dan pantau semua transaksi booking Anda</p>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-slate-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-emerald-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Main Content -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-8">
                    @if ($transaksi->isEmpty())
                        <!-- Empty State -->
                        <div class="text-center py-16">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-full mb-6">
                                <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Belum Ada Transaksi</h3>
                            <p class="text-gray-500 dark:text-gray-400 mb-6">Mulai booking lapangan untuk melihat riwayat transaksi Anda di sini.</p>
                            <a href="{{ route('user.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition duration-300 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Mulai Booking
                            </a>
                        </div>
                    @else
                        <!-- Transaction Cards -->
                        <div class="space-y-6">
                            @foreach ($transaksi as $item)
                                <div class="bg-white dark:bg-gray-700 rounded-xl border border-gray-200 dark:border-gray-600 shadow-lg hover:shadow-xl transition duration-300 overflow-hidden">
                                    <div class="p-6">
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="flex-1">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                                    {{ $item->booking->lapangan->nama }}
                                                </h3>
                                                <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm mb-2">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                    {{ \Carbon\Carbon::parse($item->booking->tanggal)->format('d M Y') }}
                                                </div>
                                                <div class="flex items-center text-gray-500 dark:text-gray-400 text-sm">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $item->booking->jam_mulai }} - {{ $item->booking->jam_selesai }}
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <!-- Status Badge -->
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                                    @if ($item->payment_status == 'menunggu_verifikasi') bg-amber-100 text-amber-800 border border-amber-200
                                                    @elseif ($item->payment_status == 'berhasil') bg-emerald-100 text-emerald-800 border border-emerald-200
                                                    @elseif ($item->payment_status == 'gagal') bg-red-100 text-red-800 border border-red-200
                                                    @else bg-gray-100 text-gray-800 border border-gray-200 @endif">
                                                    @if ($item->payment_status == 'menunggu_verifikasi')
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    @elseif ($item->payment_status == 'berhasil')
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    @elseif ($item->payment_status == 'gagal')
                                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    @endif
                                                    {{ ucwords(str_replace('_', ' ', $item->payment_status)) }}
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Divider -->
                                        <hr class="border-gray-200 dark:border-gray-600 my-4">

                                        <!-- Action Section -->
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Bukti Pembayaran
                                            </div>
                                            <div>
                                                @if ($item->payment_proof)
                                                    <a href="{{ asset('storage/' . $item->payment_proof) }}" 
                                                       target="_blank" 
                                                       class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-100 transition duration-200 text-sm font-medium">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                        Lihat Bukti
                                                    </a>
                                                @else
                                                    <a href="{{ route('user.transaksi.uploadbukti', $item->id) }}" 
                                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-50 to-purple-50 text-indigo-600 border border-indigo-200 rounded-lg hover:from-indigo-100 hover:to-purple-100 transition duration-200 text-sm font-medium">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.8 5.5 5.5 0 01 9.6-5.16 8 8 0 3.36 19.36A8.5 8.5 0 00121 16h-5.5z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8l-4 4-4-4"></path>
                                                        </svg>
                                                        Upload Bukti
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>