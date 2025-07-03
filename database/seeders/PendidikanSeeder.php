<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pendidikan')->insert([
            ['id_pendidikan' => 1, 'tingkat_pendidikan' => 'Tidak/Belum Sekolah'],
            ['id_pendidikan' => 2, 'tingkat_pendidikan' => 'TK/Sederajat'],
            ['id_pendidikan' => 3, 'tingkat_pendidikan' => 'SD/Sederajat'],
            ['id_pendidikan' => 4, 'tingkat_pendidikan' => 'SMP/Sederajat'],
            ['id_pendidikan' => 5, 'tingkat_pendidikan' => 'SMA/Sederajat'],
            ['id_pendidikan' => 6, 'tingkat_pendidikan' => 'Diploma'],
            ['id_pendidikan' => 7, 'tingkat_pendidikan' => 'Strata'],
            ['id_pendidikan' => 8, 'tingkat_pendidikan' => 'Magister'],
            ['id_pendidikan' => 9, 'tingkat_pendidikan' => 'Doktor'],
            ['id_pendidikan' => 10, 'tingkat_pendidikan' => 'Pendidikan Non-forma'],
        ]);
    }
}
