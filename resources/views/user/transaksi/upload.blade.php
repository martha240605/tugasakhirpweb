<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-white to-gray-50 border-b border-gray-100">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-light text-gray-900 tracking-tight">
                    Pembayaran Booking
                </h2>
                <p class="mt-2 text-sm text-gray-500">Complete your payment to secure your booking</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8 bg-white border-l-4 border-green-400 shadow-lg rounded-r-lg p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Main Card -->
            <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100">
                
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-white to-gray-50 px-8 py-8 border-b border-gray-100">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-900">Detail Booking</h3>
                            <p class="text-gray-500 mt-1">Review your booking information</p>
                        </div>
                    </div>
                </div>

                <!-- Booking Details -->
                <div class="px-8 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Lapangan</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $booking->lapangan->nama }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-8 0h8m-8 0a1 1 0 00-1 1v7m10-8a1 1 0 011 1v7m0 0a1 1 0 01-1 1H7a1 1 0 01-1-1V9m10 0H4"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Tanggal</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $booking->tanggal }}</p>
                                </div>
                            </div>

                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Waktu</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-500">Durasi</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $booking->durasi }} jam</p>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Total Pembayaran</p>
                                        <p class="text-3xl font-bold text-gray-900 mt-1">
                                            Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Section -->
                <div class="border-t border-gray-100 px-8 py-8 bg-gradient-to-r from-gray-50 to-white">
                    <div class="mb-6">
                        <h4 class="text-xl font-semibold text-gray-900 mb-2">Upload Bukti Pembayaran</h4>
                        <p class="text-gray-600">Silakan upload bukti transfer atau pembayaran Anda</p>
                    </div>

                    <form action="{{ route('user.transaksi.uploadbukti', $booking->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="space-y-6">
                            <div>
                                <label for="payment_proof" class="block text-sm font-medium text-gray-700 mb-3">
                                    Bukti Pembayaran
                                </label>
                                <div class="relative">
                                    <input type="file" 
                                           name="payment_proof" 
                                           id="payment_proof" 
                                           accept="image/*"
                                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-2xl cursor-pointer bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-4 file:px-6 file:rounded-l-2xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-blue-500 file:to-purple-600 file:text-white hover:file:from-blue-600 hover:file:to-purple-700 transition-all duration-200"
                                           required />
                                </div>
                                @error('payment_proof')
                                    <p class="mt-2 text-sm text-red-600 bg-red-50 px-4 py-2 rounded-lg border border-red-200">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="submit" 
                                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-2xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                    </svg>
                                    Bayar & Upload Bukti
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Payment Instructions -->
            <div class="mt-8 bg-white rounded-3xl shadow-xl border border-gray-100 p-8">
                <h4 class="text-xl font-semibold text-gray-900 mb-4">Informasi Pembayaran</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <p class="text-gray-700">Transfer ke rekening yang tersedia</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <p class="text-gray-700">Upload bukti pembayaran yang jelas</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                            <p class="text-gray-700">Pastikan nominal sesuai dengan total harga</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            <p class="text-gray-700">Format file: JPG, PNG, atau PDF</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            <p class="text-gray-700">Maksimal ukuran file 5MB</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                            <p class="text-gray-700">Verifikasi dalam 1x24 jam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>