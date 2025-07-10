<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\TimeSlot;
use App\Models\Transaksi;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->with(['lapangan', 'timeSlot', 'transaksi'])
            ->latest()
            ->get();
        return view('user.booking.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $lapanganId = $request->query('lapangan_id');

        $lapangan = Lapangan::findOrFail($lapanganId); // agar $lapangan->id valid
        $timeSlots = TimeSlot::all();

        return view('user.booking.create', compact('lapangan', 'timeSlots', 'lapanganId'));
    }



    public function store(Request $request)
{
    $request->validate([
        'lapangan_id' => 'required|exists:lapangans,id',
        'time_slot_id' => 'required|exists:time_slots,id',
        'tanggal' => 'required|date|after_or_equal:today',
        'durasi' => 'required|integer|min:1',
    ]);

    $lapangan = Lapangan::findOrFail($request->lapangan_id);
    $timeSlot = TimeSlot::findOrFail($request->time_slot_id);

    $requestedStart = \Carbon\Carbon::parse($request->tanggal . ' ' . $timeSlot->jam_mulai);
    $durasi = (int) $request->durasi;
    $requestedEnd = $requestedStart->copy()->addHours($durasi);

    // Cek tabrakan
    $cekBentrok = Booking::where('lapangan_id', $request->lapangan_id)
        ->where('tanggal', $request->tanggal)
        ->where(function ($query) use ($requestedStart, $requestedEnd) {
            $query->whereBetween('jam_mulai', [$requestedStart->format('H:i:s'), $requestedEnd->format('H:i:s')])
                ->orWhereBetween('jam_selesai', [$requestedStart->format('H:i:s'), $requestedEnd->format('H:i:s')])
                ->orWhere(function ($query) use ($requestedStart, $requestedEnd) {
                    $query->where('jam_mulai', '<=', $requestedStart->format('H:i:s'))
                          ->where('jam_selesai', '>=', $requestedEnd->format('H:i:s'));
                });
        })
        ->exists();

    if ($cekBentrok) {
        return back()->with('error', 'Waktu yang Anda pilih bentrok dengan booking lain di lapangan ini!');
    }

    // Simpan booking
    $booking = Booking::create([
        'user_id' => Auth::id(),
        'lapangan_id' => $lapangan->id,
        'time_slot_id' => $timeSlot->id,
        'tanggal' => $request->tanggal,
        'jam_mulai' => $timeSlot->jam_mulai,
        'jam_selesai' => $requestedEnd->format('H:i:s'),
        'durasi' => $durasi,
        'total_harga' => $lapangan->harga_per_jam * $durasi,
        'status' => 'pending',
    ]);

    // Arahkan ke transaksi.create
    return redirect()->route('user.transaksi.create', $booking->id)->with('success', 'Booking berhasil! Silakan lanjut ke pembayaran.');
}


    public function destroy(Booking $booking)
    {
        if ($booking->user_id != Auth::id() || $booking->status !== 'pending') {
            return redirect()->back()->withErrors('Tidak bisa membatalkan booking ini. Hanya booking dengan status "pending" milik Anda yang bisa dibatalkan.');
        }

        $booking->delete();

        return redirect()->route('user.booking.index')->with('success', 'Booking berhasil dibatalkan.');
    }
}
