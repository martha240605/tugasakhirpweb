<?php

namespace App\Http\Controllers\Admin;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
     public function index()
    {
        $transaksi = Transaksi::with('booking.user')->latest()->get();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    public function create()
    {
        $bookings = Booking::with('user')->get();
        return view('admin.transaksi.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|string',
            'payment_proof' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_date' => 'nullable|date',
        ]);

        $path = null;
        if ($request->hasFile('payment_proof')) {
            $path = $request->file('payment_proof')->store('payment_proofs', 'public');
        }

        Transaksi::create([
            'booking_id' => $request->booking_id,
            'payment_method' => $request->payment_method,
            'payment_proof' => $path,
            'payment_status' => $request->payment_status,
            'payment_date' => $request->payment_date ?? now(),
        ]);

        return redirect()->route('admin.transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load('booking.user');
        return view('admin.transaksi.show', compact('transaksi'));
    }
}
