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

    public function show($id)
    {
        $transaksi = Transaksi::with('booking.lapangan')
            ->whereHas('booking', function ($query) {
                $query->where('user_id', Auth::id());
            })->findOrFail($id);

        return view('user.transaksi.show', compact('transaksi'));
    }

    public function uploadBukti(Request $request, $id)
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

        return redirect()->route('user.transaksi.index')->with('success', 'Bukti pembayaran berhasil diupload.');
    }
}
