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

       $data ['booking'] = Booking::all(); 
        return view('admin.booking.index', $data);
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'lapangan']); // Load relasi user dan field
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,rejected,completed,canceled',
            'admin_notes' => 'nullable|string|max:500',
        ]);

        $booking->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return redirect()->route('admin.bookings.show', $booking)->with('success', 'Status booking berhasil diperbarui!');
    }
}
