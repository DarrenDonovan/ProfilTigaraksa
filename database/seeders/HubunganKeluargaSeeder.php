<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HubunganKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hubungan_keluarga')->insert([
            ['id_hubungan' => 1, 'hubungan_keluarga' => 'Kepala Keluarga'],
            ['id_hubungan' => 2, 'hubungan_keluarga' => 'Suami'],
            ['id_hubungan' => 3, 'hubungan_keluarga' => 'Istri'],
            ['id_hubungan' => 4, 'hubungan_keluarga' => 'Anak'],
            ['id_hubungan' => 5, 'hubungan_keluarga' => 'Menantu'],
            ['id_hubungan' => 6, 'hubungan_keluarga' => 'Cucu'],
            ['id_hubungan' => 7, 'hubungan_keluarga' => 'Orang Tua'],
            ['id_hubungan' => 8, 'hubungan_keluarga' => 'Mertua'],
            ['id_hubungan' => 9, 'hubungan_keluarga' => 'Famili Lain'],
            ['id_hubungan' => 10, 'hubungan_keluarga' => 'Pembantu'],
            ['id_hubungan' => 11, 'hubungan_keluarga' => 'Lainnya'],
        ]);
    }
}
