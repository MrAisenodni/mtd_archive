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
            // For Master
            Masters\CountrySeeder::class,
            Masters\ProvinceSeeder::class,
            Masters\CitySeeder::class,
            Masters\DistrictSeeder::class,
            Masters\WardSeeder::class, // Komentar sementara untuk mempercepat Migrasi
            Masters\CompanySeeder::class,
            Masters\DepartmentSeeder::class,
            Masters\DepartmentGroupSeeder::class,
            Masters\LetterLocationSeeder::class,
            Masters\LetterStatusSeeder::class,
            Masters\LetterTypeSeeder::class,
            Masters\PositionSeeder::class,
            Masters\RetentionSeeder::class,
            Masters\SaveMethodSeeder::class,
            Masters\UserSeeder::class,
            
            // For Setting
            Settings\ProviderSeeder::class,
            Settings\LoginSeeder::class,
            Settings\MenuSeeder::class,
            Settings\SubMenuSeeder::class,
        ]);
    }
}
