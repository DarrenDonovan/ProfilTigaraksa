<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        WilayahSeeder::class,
        UserSeeder::class,
        AgamaSeeder::class,
        HubunganKeluargaSeeder::class,
        PendidikanSeeder::class,
        StatusNikahSeeder::class,
    ]);
    }
}
