<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Transaksi;
use App\Models\Lapangan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalBooking = Booking::where('user_id', $user->id)->count();
        $totalTransaksi = Transaksi::whereHas('booking', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->count();
$lapangans = Lapangan::where('status', 'Tersedia')->paginate(9);
        return view('user.dashboard', compact('totalBooking', 'totalTransaksi', 'lapangans'));
    }
}
