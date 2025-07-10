<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\LapanganController as AdminLapanganController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Admin\TimeSlotController as AdminTimeSlotController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Middleware\AdminMiddleware; 
use App\Http\Middleware\UserMiddleware; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ComprehensiveReportController as AdminComprehensiveReportController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
  
    if (Auth::check()) {
        $user = Auth::user();
        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('user.dashboard');
    }
    return redirect('/'); 
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('transaksi', AdminTransaksiController::class);
    Route::resource('timeslot', AdminTimeSlotController::class);
    Route::resource('lapangan', AdminLapanganController::class);
    Route::resource('booking', AdminBookingController::class);
    Route::get('users', [AdminUserController::class, 'index'])->name('users.index');
    Route::delete('booking/{booking}', [AdminUserController::class, 'destroy'])->name('booking.destroy');
    Route::delete('users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::get('/laporan', [AdminComprehensiveReportController::class, 'index'])->name('laporan.index');
     Route::get('/laporan/generate', [AdminComprehensiveReportController::class, 'cetak'])->name('laporan.cetak');
});

Route::middleware(['auth', UserMiddleware::class])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::resource('booking', UserBookingController::class);
    Route::resource('transaksi', UserTransaksiController::class);
    Route::put('/booking/{id}', [UserBookingController::class, 'edit'])->name('user.booking.edit');

});
Route::get('/user/transaksi/create/{booking_id}', [UserTransaksiController::class, 'create'])->name('user.transaksi.create');
Route::get('/user/transaksi/upload/{booking_id}', [UserTransaksiController::class, 'uploadbukti'])->name('user.transaksi.uploadbukti');

require __DIR__.'/auth.php';