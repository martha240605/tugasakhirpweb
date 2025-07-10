<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LapanganSeeder extends Seeder
{
    public function run()
    {
        DB::table('lapangans')->insert([
            [
                'nama' => 'Lapangan Futsal Victory',
                'jenis' => 'Futsal',
                'harga_per_jam' => 120000,
                'deskripsi' => 'Lapangan indoor dengan rumput sintetis berkualitas di Jalan Merdeka No.10, Medan.',
                'gambar' => 'lapanganfutsal1.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Badminton Sunrise',
                'jenis' => 'Badminton',
                'harga_per_jam' => 80000,
                'deskripsi' => 'Tersedia 4 lapangan dengan pencahayaan LED di Komplek Asia Mega Mas, Blok C3.',
                'gambar' => 'lapanganbadmin1.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Voli Sakura',
                'jenis' => 'Voli',
                'harga_per_jam' => 70000,
                'deskripsi' => 'Berada di pinggir danau kecil di Desa Tuntungan, cocok untuk event santai.',
                'gambar' => 'lapanganvoli1.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Basket Galaxy',
                'jenis' => 'Basket',
                'harga_per_jam' => 95000,
                'deskripsi' => 'Lapangan basket full size di dalam Gedung Olahraga Galaxy, Jalan Letda Sujono.',
                'gambar' => 'lapanganbasket1.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Futsal Arena 45',
                'jenis' => 'Futsal',
                'harga_per_jam' => 110000,
                'deskripsi' => 'Dekat pusat perbelanjaan Manhattan Times Square, lokasi strategis dan mudah diakses.',
                'gambar' => 'lapanganfutsal2.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Badminton Green Leaf',
                'jenis' => 'Badminton',
                'harga_per_jam' => 85000,
                'deskripsi' => 'Dikelilingi pohon rindang, terletak di Jalan Setia Budi ujung, Medan Sunggal.',
                'gambar' => 'lapanganbadmin3.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Tenis Blue Court',
                'jenis' => 'Tenis',
                'harga_per_jam' => 95000,
                'deskripsi' => 'Lapangan standar internasional di Jalan Dr. Mansyur No.20.',
                'gambar' => 'lapangantenis1.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Voli Pantai Coral',
                'jenis' => 'Voli',
                'harga_per_jam' => 75000,
                'deskripsi' => 'Lapangan voli  dengan nuansa memikat di dalam kawasan Coral Park, Medan Johor.',
                'gambar' => 'lapanganvoli3.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Basket Urban Zone',
                'jenis' => 'Basket',
                'harga_per_jam' => 100000,
                'deskripsi' => 'Dilengkapi sound system dan tribun mini di Jalan Iskandar Muda, dekat SMA 1 Medan.',
                'gambar' => 'lapanganbasket2.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'Lapangan Badminton Elang',
                'jenis' => 'Badminton',
                'harga_per_jam' => 100000,
                'deskripsi' => 'Lapangan terbuka dengan permukaan keras di Jalan Gatot Subroto KM 5,5 Medan Helvetia.',
                'gambar' => 'lapanganbadmin2.jpg',
                'status' => 'Tersedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
