<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\TimeSlot;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('lapangan')->latest()->get();
        return view('user.booking.index', compact('bookings'));
    }

    public function create()
    {
        $lapangan = Lapangan::where('status', 'tersedia')->get();
        $timeslot = TimeSlot::all();
        return view('user.booking.create', compact('lapangan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lapangan_id' => 'required|exists:lapangan,id',
            'time_slot_id' => 'required|exists:time_slots,id',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);
        $cek = Booking::where('tanggal', $request->tanggal)
            ->where('lapangan_id', $request->lapangan_id)
            ->where('time_slot_id', $request->time_slot_id)
            ->exists();

        if ($cek) {
            return back()->with('error', 'Jam sudah dibooking!');
        }

        $durasi = (strtotime($request->jam_selesai) - strtotime($request->jam_mulai)) / 3600;

        $lapangan = Lapangan::findOrFail($request->lapangan_id);
        $timeslot = TimeSlot::findOrFail($request->time_slot_id);
        $totalHarga = $durasi * $lapangan->harga_per_jam;

        Booking::create([
            'user_id' => Auth::id(),
            'lapangan_id' => $lapangan->id,
            'time_slot_id' => $timeslot->id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'durasi' => $durasi,
            'total_harga' => $totalHarga,
            'status' => 'pending',
        ]);

        return redirect()->route('user.bookings.index')->with('success', 'Booking berhasil dibuat dan menunggu persetujuan admin.');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id != Auth::id() || $booking->status !== 'pending') {
            return redirect()->back()->withErrors('Tidak bisa membatalkan booking ini.');
        }

        $booking->delete();

        return redirect()->route('user.bookings.index')->with('success', 'Booking berhasil dibatalkan.');
    }
}
