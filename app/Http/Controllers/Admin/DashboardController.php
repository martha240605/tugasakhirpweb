<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Lapangan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();

        // Hitung total lapangan
        $totalTransaksi = Transaksi::count();
$totalLapangan = Lapangan::count();
        // Hitung booking yang masih pending
        $totalBooking = Booking::count();

        // Anda bisa menambahkan data lain yang ingin ditampilkan di dashboard admin

        // Kirimkan data ke view
        return view('admin.dashboard', compact('totalUsers','totalLapangan', 'totalTransaksi', 'totalBooking'));
   
    }
}
