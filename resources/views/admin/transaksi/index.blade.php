@extends('layouts.admin')

@section('title', 'Manajemen Transaksi')
@section('header_title', 'Daftar Transaksi')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Transaksi</h2>

    @if ($transaksis->isEmpty())
        <p class="text-gray-600">Belum ada transaksi yang tercatat.</p>
    @else
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Pengguna</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Lapangan</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Tanggal Booking</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Total Bayar</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider">Bukti</th>
                            <th class="px-6 py-3 font-medium text-gray-600 uppercase tracking-wider text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $transaksi)
                            <tr class="border-t">
                                <td class="px-6 py-4 text-gray-900">#{{ $transaksi->id }}</td>
                                <td class="px-6 py-4">{{ $transaksi->booking->user->name }}</td>
                                <td class="px-6 py-4">{{ $transaksi->booking->lapangan->nama }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($transaksi->booking->tanggal)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp{{ number_format($transaksi->booking->total_harga, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="capitalize px-2 py-1 rounded 
                                        @if ($transaksi->payment_status == 'menunggu_verifikasi')
                                            bg-yellow-200 text-yellow-800
                                        @elseif ($transaksi->payment_status == 'verifikasi_diterima')
                                            bg-green-200 text-green-800
                                        @elseif ($transaksi->payment_status == 'verifikasi_ditolak')
                                            bg-red-200 text-red-800
                                        @else
                                            bg-gray-100 text-gray-700
                                        @endif
                                    ">
                                        {{ str_replace('_', ' ', $transaksi->payment_status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($transaksi->payment_proof)
                                        <a href="{{ asset('storage/' . $transaksi->payment_proof) }}" target="_blank"
                                            class="text-blue-500 hover:underline">Lihat Bukti</a>
                                    @else
                                        <span class="text-gray-500 italic">Belum diunggah</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('admin.transaksi.show', $transaksi->id) }}"
                                        class="text-blue-600 hover:text-blue-800">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
