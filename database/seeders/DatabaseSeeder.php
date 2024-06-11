<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\VillageSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\ProvinceSeeder;
use Database\Seeders\RegionTypeSeeder;
use Database\Seeders\SubdistrictSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RegionTypeSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            SubdistrictSeeder::class,
            VillageSeeder::class,
        ]);
    }
}
