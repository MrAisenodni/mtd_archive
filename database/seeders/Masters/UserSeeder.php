<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/User.csv';
        $this->tablename = 'mst_user';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'nik', 'full_name', 'gender', 'birth_place', 'birth_date', 'email', 'religion_id', 'position_id'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_user ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_user OFF');
    }
}
