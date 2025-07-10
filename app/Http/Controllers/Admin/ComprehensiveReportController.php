<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ComprehensiveReportController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }
    public function cetak()
    {
        // Ambil data yang dibutuhkan
        $totalBookings = Booking::count();
        $totalLapangans= Lapangan::count();
        $totalUsers = User::count();

        // Ambil beberapa booking terbaru (misal 10 booking terakhir)
        $latestBookings = Booking::with(['user', 'lapangan'])
            ->latest()
            ->limit(10)
            ->get();

        // Ambil semua data lapangan
        $data = Lapangan::all();

        // Ambil semua data pengguna (kecuali admin, jika ada role_id)
        $users = User::where('id', '!=', Auth::id()) // Contoh: tidak include user yang sedang login
            ->when(config('your_app.admin_role_id'), function ($query) {
                // Asumsi ada kolom 'role_id' di tabel users
                // dan ada config 'your_app.admin_role_id'
                return $query->where('role_id', '!=', config('your_app.admin_role_id'));
            })
            ->get();

        // Siapkan data untuk view PDF
        $data = [
            'reportTitle' => 'Laporan Komprehensif Sport Center',
            'generatedAt' => Carbon::now()->format('d M Y H:i:s'),
            'totalBookings' => $totalBookings,
            'totaLapangans' => $totalLapangans,
            'totalUsers' => $totalUsers,
            'latestBookings' => $latestBookings,
            'lapangans' => $data,
            'users' => $users,
        ];

        // Load view PDF dan passing data
        $pdf = Pdf::loadView('admin.laporan.cetak', $data);

        // Unduh PDF
        return $pdf->download('laporan_komprehensif_' . Carbon::now()->format('Ymd_His') . '.pdf');
    }
}
