<?php

namespace App\Http\Controllers\Admin;
use App\Models\Lapangan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

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
            'status' => 'required|in:Tersedia,Disewa',
            'image' => 'required|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('lapangan_images', 'public'); 
        }

        Lapangan::create([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'harga_per_jam' => $request->harga_per_jam,
            'status' => $request->status,
            'gambar' => $imagePath,
        ]);

        return redirect()->route('admin.lapngan.index')->with('success', 'Lapangan berhasil ditambahkan!');
    }
    public function edit(string $id)
    {
        $data['lapangan'] = Lapangan:: find($id);
        return view('admin.lapangan.edit', $data);

    }

    /**
     * Mengupdate data lapangan di database.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'nullable|string',
            'harga_per_jam' => 'required|numeric|min:0',
            'status' =>'required|in:Tersedia,Disewa',
            'gambar' => 'required|image',
        ]);

        $imagePath = null;
        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('lapangan_images', 'public'); 
        }
        $cari = Lapangan:: find($id);
        $cari->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga_per_jam' => $request->harga_per_jam,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $imagePath,
        ]);

    return redirect()->route('admin.lapangan.index')->with('success', 'Lapangan berhasil diperbarui!');
    }

    /**
     * Menghapus lapangan dari database.
     */
    public function destroy(string $id)
    {
        $cari = Lapangan:: find($id);
        $cari->delete();
        return redirect()->route('produk.index')->with('success', 'Lapangan berhasil dihapus!');
    }

}
