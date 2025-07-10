<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-green-800 to-green-600 border-b border-green-500">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-white leading-tight">
                    {{ __('Dashboard Pengguna') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-green-900 via-green-700 to-green-500 min-h-screen">
        <div class="absolute inset-0 bg-gradient-to-t from-white via-green-100 to-transparent opacity-70"></div>
        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-xl sm:rounded-3xl border border-green-200">
                <div class="p-8 text-gray-900">
                    <!-- Welcome Section -->
                    <div class="bg-gradient-to-r from-white to-green-50 rounded-2xl p-8 mb-8 border border-green-100 shadow-lg">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-600 to-green-800 rounded-2xl flex items-center justify-center shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold mb-2 text-gray-900">Selamat Datang di Dashboard Pengguna!</h1>
                                <p class="text-lg text-gray-700 mb-1">Halo, {{ Auth::user()->name ?? 'Pengguna' }}!</p>
                                <p class="text-gray-600">Ini adalah halaman utama untuk pengguna yang sudah login.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Available Fields Section -->
                    <div class="bg-gradient-to-r from-white to-green-50 rounded-2xl p-8 border border-green-100 shadow-lg">
                        <div class="flex items-center space-x-4 mb-8">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-600 to-green-800 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-semibold text-gray-900">Lapangan Tersedia</h3>
                                <p class="text-gray-600">Pilih lapangan yang ingin Anda booking</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @forelse ($lapangans as $lapangan)
                                <a href="{{ route('user.booking.create', ['lapangan_id' => $lapangan->id]) }}" 
                                   class="group block bg-white rounded-2xl shadow-xl border border-green-200 overflow-hidden hover:shadow-2xl hover:border-green-400 transition-all duration-300 transform hover:scale-105 hover:-translate-y-2">
                                    <div class="relative overflow-hidden">
                                        @if ($lapangan->gambar)
                                            <img src="{{ asset('storage/' . $lapangan->gambar) }}" 
                                                 alt="{{ $lapangan->nama }}" 
                                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                        @else
                                            <img src="https://via.placeholder.com/640x360?text=No+Image" 
                                                 alt="No Image" 
                                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                        <div class="absolute top-4 right-4">
                                            <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full shadow-lg">Tersedia</span>
                                        </div>
                                    </div>
                                    
                                    <div class="p-6 bg-gradient-to-b from-white to-green-50">
                                        <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-700 transition-colors">{{ $lapangan->nama }}</h4>
                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full mb-3 font-semibold">{{ $lapangan->jenis }}</span>
                                        <p class="text-gray-600 text-sm mb-4 leading-relaxed line-clamp-3">{{ Str::limit($lapangan->deskripsi, 100) }}</p>
                                        
                                        <div class="flex justify-between items-center pt-4 border-t border-green-100">
                                            <div>
                                                <p class="text-green-700 font-bold text-xl">Rp {{ number_format($lapangan->harga_per_jam, 0, ',', '.') }}</p>
                                                <p class="text-green-600 text-sm">per jam</p>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span class="text-green-700 font-medium">Book Now</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @empty
                                <div class="col-span-full text-center py-16">
                                    <div class="bg-white rounded-2xl shadow-xl border border-green-200 p-12 max-w-md mx-auto">
                                        <div class="w-20 h-20 bg-gradient-to-br from-green-600 to-green-800 rounded-full flex items-center justify-center mx-auto mb-6">
                                            <svg class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9.172 16.172L6.34 19.004a4 4 0 01-5.656-5.656l2.832-2.832M9.172 16.172L12 13.344l2.828 2.828M6.34 19.004L19.004 6.34a4 4 0 00-5.656-5.656L10.5 3.516l-2.828 2.828" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-semibold text-gray-900 mb-4">Belum Ada Lapangan</h3>
                                        <p class="text-gray-600 text-lg">Belum ada lapangan yang tersedia saat ini.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Pagination -->
                        <div class="mt-12 bg-white rounded-2xl p-6 border border-green-200 shadow-lg">
                            <div class="flex justify-center">
                                {{ $lapangans->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Custom pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            space-x: 2;
        }
        
        .pagination a, .pagination span {
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 0.75rem;
            border: 1px solid #d1fae5;
            background: white;
            color: #065f46;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        .pagination a:hover {
            background: #16684c;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(16, 185, 129, 0.3);
        }
        
        .pagination .active span {
            background: linear-gradient(to right, #059669, #047857);
            color: white;
            border-color: #047857;
        }
        
        .pagination .disabled span {
            color: #9ca3af;
            background: #f9fafb;
            cursor: not-allowed;
        }
    </style>
</x-app-layout>