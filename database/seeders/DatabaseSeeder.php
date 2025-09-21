<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MasyarakatUserSeeder;
use Database\Seeders\IndoRegionRegencySeeder;
use Database\Seeders\IndoRegionVillageSeeder;
use Database\Seeders\IndoRegionDistrictSeeder;
use Database\Seeders\IndoRegionProvinceSeeder;
use Database\Seeders\PengaduanTanggapanSeeder;

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
            IndoRegionProvinceSeeder::class,
            IndoRegionRegencySeeder::class,
            IndoRegionDistrictSeeder::class,
            IndoRegionVillageSeeder::class,
            UserSeeder::class,
            MasyarakatUserSeeder::class,
            PengaduanTanggapanSeeder::class,
        ]);
    }
}
