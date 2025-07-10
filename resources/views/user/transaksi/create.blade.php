<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 -mx-4 -mt-4 px-4 pt-4 pb-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 mr-4">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.8.4l1.48 1.4h3.38a2 2 0 012 2v2.27a6.002 6.002 0 00-.18 12.73v1.15a2 2 0 01-2 2H5a2 2 0 01-2-2v-1.17a6.002 6.002 0 00-.18-12.73V5z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-white mb-1">
                        {{ __('Upload Bukti Pembayaran') }}
                    </h2>
                    <p class="text-emerald-100 opacity-90">Selesaikan pembayaran booking Anda dengan mudah</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gradient-to-br from-white via-emerald-50 to-emerald-800 dark:from-gray-900 dark:to-gray-800 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
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

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Payment Instructions -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-6 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Instruksi Pembayaran</h3>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Silakan lakukan transfer pembayaran ke rekening berikut:
                        </p>
                        
                        <div class="space-y-4">
                            <!-- Dana Payment -->
                            <div class="bg-orange-50 dark:bg-orange-900/20 p-4 rounded-xl border border-orange-200 dark:border-orange-800">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-orange-100 dark:bg-orange-900/50 rounded-full flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.667 0-3 1.333-3 3s1.333 3 3 3 3-1.333 3-3-1.333-3-3-3z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12V7a7 7 0 0114 0v5"></path>
                                            </svg>
                                        </div>
                                        <span class="font-medium text-orange-900 dark:text-orange-100">Dana</span>
                                    </div>
                                    <span class="text-xs bg-orange-100 dark:bg-orange-900/50 text-orange-800 dark:text-orange-200 px-2 py-1 rounded-full">Recommended</span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div>
                                        <span class="text-gray-500 dark:text-gray-400">Nomor Dana</span>
                                        <p class="font-semibold text-orange-900 dark:text-orange-100">083824515936</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-500 dark:text-gray-400">Atas Nama</span>
                                        <p class="font-semibold text-orange-900 dark:text-orange-100">MARTHA</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Transfer -->
                            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-xl border border-blue-200 dark:border-blue-800">
                                <div class="flex items-center mb-3">
                                    <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="3 16l 3-3m0 0l 3-3m-3 3h15"></path>
                                        </svg>
                                    </div>
                                    <span class="font-medium text-blue-900 dark:text-blue-100">Bank Transfer</span>
                                </div>
                                <div class="text-sm">
                                    <div class="flex justify-between mb-2">
                                        <span class="text-gray-500 dark:text-gray-400">Bank</span>
                                        <span class="font-semibold text-blue-900 dark:text-blue-100">BRI</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-500 dark:text-gray-400">No. Rekening</span>
                                        <span class="font-semibold text-blue-900 dark:text-blue-100">008801234567890</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-red-50 dark:bg-red-900/20 rounded-xl border border-red-200 dark:border-red-800">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-red-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.932L12 5.088c-.56-1.104-1.776-1.728-2.462-1.482L2.748 6.632C1.748 6.983 1.728 8.17 2.748 8.521L7.3 21.598C7.96 21.907 8.72 21.827 9.04 21.07c.8-1.32 1.2-2.97 1.24-4.64 0-4.49-3.9-8.37-8.72-8.37z"></path>
                                </svg>
                                <div>
                                    <p class="text-sm text-red-800 dark:text-red-200 font-medium">Penting!</p>
                                    <p class="text-sm text-red-700 dark:text-red-300 mt-1">
                                        Setelah transfer, harap unggah bukti pembayaran untuk memverifikasi booking Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Form -->
                <div class="space-y-6">
                    <!-- Booking Details -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/50 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Booking</h3>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Lapangan</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $booking->lapangan->nama }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Tanggal</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $booking->tanggal }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Jam</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</span>
                                </div>
                                <div class="flex items-center justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Durasi</span>
                                    <span class="font-semibold text-gray-900 dark:text-white">{{ $booking->durasi }} jam</span>
                                </div>
                                <div class="flex items-center justify-between py-2">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Total Harga</span>
                                    <span class="text-lg font-bold text-emerald-600 dark:text-emerald-400">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Upload Form -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-emerald-50 to-teal-50 dark:from-emerald-900/20 dark:to-teal-900/20 p-6 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/50 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.8 5.5 5.5 0 0110.8-1.6 8.5 8.5 0 102.8 6.4C28.7 16 8.3 19.1 7 16z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.8 5.5 5.5 0 0110.8-1.6 8.5 8.5 0 102.8 6.4C28.7 16 8.3 19.1 7 16z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Upload Bukti Pembayaran</h3>
                            </div>
                        </div>

                        <div class="p-6">
                            <form action="{{ route('user.transaksi.upload', $booking->transaksi->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="space-y-6">
                                    <!-- File Upload Area -->
                                    <div class="relative">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                            Pilih File Bukti Pembayaran
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-emerald-400 transition-colors duration-200">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L24 28M8 32l9.172-9.172a4 4 0 015.656 0L32 32m-25 5 2.828-2.828a4 4 0 01 5.656 0L20 32m3-6v6m0 0v6m0-6h6m-6 0H6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600 dark:text-gray-400">
                                                    <label for="payment_proof" class="relative cursor-pointer bg-white dark:bg-gray-800 rounded-md font-medium text-emerald-600 hover:text-emerald-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-emerald-500">
                                                        <span>Upload file</span>
                                                        <input id="payment_proof" name="payment_proof" type="file" class="sr-only" accept="image/*" required>
                                                    </label>
                                                    <p class="pl-1">atau drag and drop</p>
                                                </div>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                                    PNG, JPG, GIF hingga 10MB
                                                </p>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('payment_proof')" class="mt-2" />
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-medium rounded-xl hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-300 shadow-lg">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.8 5.5 5.5 0 0110.8-1.6 8.5 8.5 0 102.8 6.4C28.7 16 8.3 19.1 7 16z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ __('Upload & Selesaikan Pembayaran') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>