<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::whereHas('booking', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('booking.lapangan')->latest()->get();

        return view('user.transaksi.index', compact('transaksi'));
    }

    public function create($booking_id)
    {
        $booking = Booking::where('user_id', Auth::id())->findOrFail($booking_id);

        $transaksi = Transaksi::firstOrCreate(
            ['booking_id' => $booking->id],
            [
                'payment_method' => 'transfer',
                'payment_status' => 'pending',
                'payment_proof' => null,
                'payment_date' => null,
            ]
        );

        return view('user.transaksi.upload', compact('booking', 'transaksi'));
    }

    public function show($id)
    {
        
    }

    public function uploadbukti(Request $request, $id)
    {
        $transaksi = Transaksi::whereHas('booking', function ($query) {
            $query->where('user_id', Auth::id());
        })->findOrFail($id);

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($transaksi->payment_proof) {
            Storage::delete($transaksi->payment_proof);
        }

        $path = $request->file('payment_proof')->store('bukti_pembayaran');

        $transaksi->update([
            'payment_proof' => $path,
            'payment_status' => 'menunggu_verifikasi',
            'payment_date' => now(),
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pembayaran berhasil diupload.');

    }
}
