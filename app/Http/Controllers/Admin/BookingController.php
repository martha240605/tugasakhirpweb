<?php

namespace App\Http\Controllers\Admin;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
     public function index(Request $request)
    {
        $query = Booking::with(['user', 'lapangan']);

        // Filter berdasarkan status jika ada parameter 'status' di URL
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $bookings = $query->latest()->get();

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'lapangan']);
        return view('admin.bookings.show', compact('booking'));
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

        return redirect()->route('admin.bookings.index', $booking)->with('success', 'Status booking berhasil diperbarui!');
    }
}
