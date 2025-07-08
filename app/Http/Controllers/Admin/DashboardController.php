<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalBooking = Booking::count();
        $totalTransaction = Transaksi::count();

        return view('admin.dashboard', compact('totalUsers', 'totalBooking', 'totalTransaction'));
    }
}
