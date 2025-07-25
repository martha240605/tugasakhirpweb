<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;
    protected $table = 'lapangans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'jenis',
        'harga_per_jam',
        'deskripsi',
        'gambar',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
