<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalBooking = Booking::where('user_id', $user->id)->count();
        $totalTransaction = Transaksi::whereHas('booking', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })->count();

        return view('user.dashboard', compact('totalBooking', 'totalTransaction'));
    }
}
