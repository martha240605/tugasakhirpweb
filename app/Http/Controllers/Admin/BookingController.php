<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Lapangan;
use App\Models\TimeSlot;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'lapangan', 'timeslot']);

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->get();

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'lapangan', 'timeslot']);
        return view('admin.booking.show', compact('booking'));
    }
    public function create()
    {
        $users = User::where('role', 'user')->get();
        $lapangans = Lapangan::all();
        $timeSlots = TimeSlot::all();

        return view('admin.booking.create', compact('users', 'lapangans', 'timeSlots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lapangan_id' => 'required|exists:lapangans,id',
            'time_slot_id' => 'required|exists:time_slots,id',
            'tanggal' => 'required|date|after_or_equal:today',
            'durasi' => 'required|integer|min:1',
        ]);

        $lapangan = Lapangan::findOrFail($request->lapangan_id);
        $timeSlot = TimeSlot::findOrFail($request->time_slot_id);

        $jamMulai = Carbon::parse($timeSlot->jam_mulai);
        $jamSelesai = $jamMulai->copy()->addHours($request->durasi);

        Booking::create([
            'user_id' => $request->user_id,
            'lapangan_id' => $lapangan->id,
            'time_slot_id' => $timeSlot->id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $timeSlot->jam_mulai,
            'jam_selesai' => $jamSelesai->format('H:i:s'),
            'durasi' => $request->durasi,
            'total_harga' => $lapangan->harga_per_jam * $request->durasi,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil ditambahkan.');
    }
    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,disetujui,dibatalkan',
        ]);


        $booking->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.booking.index', $booking)->with('success', 'Status booking berhasil diperbarui!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.booking.index')->with('success', 'Booking berhasil dihapus.');
    }
}
