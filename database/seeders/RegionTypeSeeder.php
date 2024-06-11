<?php

namespace Database\Seeders;

use App\Models\RegionType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RegionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regionTypes = [
            ['name' => 'kabupaten'],
            ['name' => 'kota'],
            ['name' => 'kelurahan'],
            ['name' => 'desa'],
        ];

        foreach ($regionTypes as $type) {
            RegionType::create($type);
        }
    }
}
