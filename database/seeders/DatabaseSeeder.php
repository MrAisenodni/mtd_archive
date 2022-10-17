<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            // For Menu
            Settings\MenuSeeder::class,
            Settings\SubMenuSeeder::class,
            Settings\ProviderSeeder::class,
  
            // For User Login
            Masters\UserSeeder::class,
            Settings\LoginSeeder::class,

            // For Master
            Masters\ChestSeeder::class,
            Masters\ShelfSeeder::class,
            Masters\CompanySeeder::class,
            Masters\DepartmentSeeder::class,
            Masters\DepartmentGroupSeeder::class,
            Masters\LetterStatusSeeder::class,
            Masters\LetterTypeSeeder::class,
            Masters\PositionSeeder::class,
            Masters\RetentionSeeder::class,
            Masters\SaveMethodSeeder::class,
            Masters\CountrySeeder::class,
            Masters\ProvinceSeeder::class,
            Masters\CitySeeder::class,
            Masters\DistrictSeeder::class,
            Masters\WardSeeder::class, // Komentar sementara untuk mempercepat Migrasi
        ]);
    }
}
