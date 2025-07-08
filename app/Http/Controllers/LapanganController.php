<?php

namespace App\Http\Controllers;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LapanganController extends Controller
{
    public function index()
    {
        $data ['lapangan'] = Lapangan::all(); 
        return view('admin.lapangan.index', $data);
    }

    public function create()
    {
        return view('admin.lapangan.create');
    }
   
        public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable|string',
            'harga_per_jam' => 'required|numeric|min:0',
            'status' => ['required', 'string', Rule::in(['available', 'maintenance', 'booked'])],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lapangan_images', 'public'); 
        }

        Lapangan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => $request->status,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.lapngan.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }

}
