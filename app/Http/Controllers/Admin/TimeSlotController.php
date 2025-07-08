<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;


class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::all();
        return view('admin.timeslot.index', compact('timeSlots'));
    }

    // Form tambah jam
    public function create()
    {
        return view('admin.timeslot.create');
    }

    // Simpan data jam
    public function store(Request $request)
    {
        $request->validate([
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        TimeSlot::create($request->only('jam_mulai', 'jam_selesai'));

        return redirect()->route('admin.timeslot.index')->with('success', 'Jam berhasil ditambahkan.');
    }

    // Form edit
    public function edit(TimeSlot $timeSlot)
    {
        return view('admin.timeslot.edit', compact('timeSlot'));
    }

    // Simpan edit
    public function update(Request $request, TimeSlot $timeSlot)
    {
        $request->validate([
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        $timeSlot->update($request->only('jam_mulai', 'jam_selesai'));

        return redirect()->route('admin.timeslot.index')->with('success', 'Jam berhasil diubah.');
    }

    // Hapus jam
    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();
        return redirect()->route('admin.timeslot.index')->with('success', 'Jam berhasil dihapus.');
    }
}
