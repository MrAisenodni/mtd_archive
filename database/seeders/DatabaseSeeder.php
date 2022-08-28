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
            Masters\CompanySeeder::class,
            Masters\LetterTypeSeeder::class,
            Masters\UserSeeder::class,
            
            // For Setting
            Settings\LoginSeeder::class,
            Settings\MenuSeeder::class,
            Settings\SubMenuSeeder::class,
        ]);
    }
}
