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
            Settings\UserSeeder::class,
            Settings\LoginSeeder::class,
            Settings\MenuAccessSeeder::class,

            // For Validation Parameter
            Settings\AttributesSeeder::class,
            
            // For Master
            Masters\ChestSeeder::class,
            Masters\ShelfSeeder::class,
            Masters\CompanySeeder::class,
            Masters\DepartmentSeeder::class,
            Masters\DepartmentGroupSeeder::class,
            Masters\LetterOriginSeeder::class,
            Masters\LetterStatusSeeder::class,
            Masters\LetterTypeSeeder::class,
            Masters\ReligionSeeder::class,
            Masters\RetentionSeeder::class,
            Masters\PositionSeeder::class,
            Masters\SaveMethodSeeder::class,
            Masters\CountrySeeder::class,
            Masters\ProvinceSeeder::class,
            Masters\CitySeeder::class,
            Masters\DistrictSeeder::class,
            Masters\WardSeeder::class, // Komentar sementara untuk mempercepat Migrasi
        ]);
    }
}
