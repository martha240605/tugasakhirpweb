{{-- resources/views/admin/booking/show.blade.php --}}

@extends('layouts.admin')

@section('title', 'Detail Booking')
@section('header_title', 'Detail Booking')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-8 mb-8 dark:bg-gray-800 text-gray-200 glass-dark border border-purple-500/20">
        <h1 class="text-3xl font-bold text-gray-100 mb-6 text-center">Detail Booking #{{ $booking->id }}</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div>
                <h3 class="text-xl font-semibold text-gray-100 mb-3">Informasi Booking</h3>
                <p class="mb-2"><strong class="text-gray-300">Pengguna:</strong> {{ $booking->user->name ?? 'N/A' }}</p>
                <p class="mb-2"><strong class="text-gray-300">Email Pengguna:</strong> {{ $booking->user->email ?? 'N/A' }}</p>
                <p class="mb-2"><strong class="text-gray-300">Nama Lapangan:</strong> {{ $booking->lapangan->nama ?? 'N/A' }}</p>
                
                <p class="mb-2"><strong class="text-gray-300">Tanggal Booking:</strong> {{ \Carbon\Carbon::parse($booking->tanggal)->translatedFormat('l, d F Y') }}</p>
                <p class="mb-2"><strong class="text-gray-300">Waktu Booking:</strong> {{ \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->jam_selesai)->format('H:i') }}</p>
                <p class="mb-2"><strong class="text-gray-300">Durasi:</strong> {{ $booking->durasi }} jam</p>
                <p class="mb-2"><strong class="text-gray-300">Total Harga:</strong> Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                <p class="mb-2"><strong class="text-gray-300">Status:</strong>
                    <span class="relative inline-block px-3 py-1 font-semibold leading-tight">
                        <span aria-hidden="true" class="absolute inset-0 opacity-50 rounded-full
                            @if($booking->status == 'pending') bg-yellow-400
                            @elseif($booking->status == 'disetujui') bg-green-400
                            @elseif($booking->status == 'dibatalkan') bg-red-400
                            @else bg-gray-400 @endif
                        "></span>
                        <span class="relative capitalize">{{ str_replace('_', ' ', $booking->status) }}</span>
                    </span>
                </p>
                {{-- CATATAN: Kolom 'notes' dan 'admin_notes' tidak ada di migrasi baru, jadi dihilangkan. --}}
                {{-- <p class="mb-2"><strong class="text-gray-300">Catatan Pengguna:</strong> {{ $booking->notes ?? '-' }}</p> --}}
                <p class="mb-2"><strong class="text-gray-300">Dibuat Pada:</strong> {{ $booking->created_at->translatedFormat('d M Y H:i') }}</p>
                <p class="mb-2"><strong class="text-gray-300">Terakhir Diperbarui:</strong> {{ $booking->updated_at->translatedFormat('d M Y H:i') }}</p>
            </div>
            
            {{-- CATATAN: Kolom 'payment_proof' tidak ada di migrasi baru, jadi dihilangkan. --}}
            {{-- <div>
                <h3 class="text-xl font-semibold text-gray-100 mb-3">Bukti Pembayaran:</h3>
                @if($booking->payment_proof)
                    <img src="{{ asset('storage/' . $booking->payment_proof) }}" alt="Bukti Pembayaran" class="max-w-full h-auto rounded-lg shadow-md mb-4">
                    <a href="{{ asset('storage/' . $booking->payment_proof) }}" target="_blank" class="text-blue-400 hover:underline">Lihat Gambar Ukuran Penuh</a>
                @else
                    <p class="text-gray-400">Belum ada bukti pembayaran diunggah.</p>
                @endif
            </div> --}}
        </div>

        <hr class="my-6 border-gray-700">

        <h3 class="text-2xl font-bold text-gray-100 mb-4">Aksi Admin</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-gray-700 p-6 rounded-lg shadow-inner border border-gray-600/50">
                <h4 class="text-xl font-semibold text-gray-100 mb-3">Ubah Status Booking:</h4>
                <form action="{{ route('admin.booking.index', $booking->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="status" class="block text-gray-300 text-sm font-bold mb-2">Status:</label>
                        <select id="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-600 text-white leading-tight focus:outline-none focus:shadow-outline focus:ring-green-500 focus:border-green-500 @error('status') border-red-500 @enderror" required>
                            <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ old('status', $booking->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="dibatalkan" {{ old('status', $booking->status) == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            {{-- CATATAN: Status 'pending_review', 'rejected', 'canceled', 'completed' tidak ada di migrasi baru, jadi dihilangkan. --}}
                            {{-- <option value="pending_review" {{ old('status', $booking->status) == 'pending_review' ? 'selected' : '' }}>Pending Review (Bukti pembayaran diunggah)</option>
                            <option value="rejected" {{ old('status', $booking->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            <option value="canceled" {{ old('status', $booking->status) == 'canceled' ? 'selected' : '' }}>Canceled (Dibatalkan Pengguna)</option>
                            <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed (Selesai)</option> --}}
                        </select>
                        @error('status')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div>
                    {{-- CATATAN: Kolom 'admin_notes' tidak ada di migrasi baru, jadi dihilangkan. --}}
                    {{-- <div class="mb-4">
                        <label for="admin_notes" class="block text-gray-300 text-sm font-bold mb-2">Catatan Admin (Opsional):</label>
                        <textarea id="admin_notes" name="admin_notes" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 bg-gray-600 text-white leading-tight focus:outline-none focus:shadow-outline focus:ring-green-500 focus:border-green-500 @error('admin_notes') border-red-500 @enderror">{{ old('admin_notes', $booking->admin_notes) }}</textarea>
                        @error('admin_notes')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                    </div> --}}
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Update Status
                    </button>
                </form>
            </div>

            <div class="bg-gray-700 p-6 rounded-lg shadow-inner border border-gray-600/50">
                <h4 class="text-xl font-semibold text-gray-100 mb-3">Hapus Booking:</h4>
                <p class="text-gray-300 mb-4">Hapus booking ini secara permanen dari sistem.</p>
                <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus booking ini secara permanen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
                        Hapus Booking
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="{{ route('admin.booking.index') }}" class="inline-flex items-center px-6 py-3 border border-gray-600 rounded-md font-semibold text-sm text-gray-300 uppercase tracking-widest bg-gray-700 hover:bg-gray-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 transition ease-in-out duration-150">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Booking
            </a>
        </div>
    </div>
@endsection