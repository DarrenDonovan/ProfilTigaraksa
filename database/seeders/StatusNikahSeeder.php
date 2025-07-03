<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusNikahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_nikah')->insert([
            ['id_status' => 1, 'status' => 'Tidak/Belum Menikah'],
            ['id_status' => 2, 'status' => 'Menikah'],
            ['id_status' => 3, 'status' => 'Cerai Hidup'],
            ['id_status' => 4, 'status' => 'Cerai Mati'],
        ]);
    }
}
