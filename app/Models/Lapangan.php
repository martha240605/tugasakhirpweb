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
    'type',
    'deskripsi',
    'gambar',
    'status',
    'harga_per_jam',
];
}
