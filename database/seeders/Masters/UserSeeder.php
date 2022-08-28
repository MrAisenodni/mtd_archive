<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/User.csv';
        $this->tablename = 'mst_user';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'nik', 'full_name', 'gender', 'birth_place', 'birth_date', 'email'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
