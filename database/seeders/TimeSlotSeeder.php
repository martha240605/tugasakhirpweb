<?php

namespace Database\Seeders;
use App\Models\TimeSlot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $jamMulai = strtotime('08:00:00');
        $jamTutup = strtotime('21:00:00'); // 9 malam

        while ($jamMulai < $jamTutup) {
            $jamSelesai = strtotime('+1 hour', $jamMulai);

            TimeSlot::create([
                'jam_mulai' => date('H:i:s', $jamMulai),
                'jam_selesai' => date('H:i:s', $jamSelesai),
            ]);

            $jamMulai = $jamSelesai;
        }
    }
}
