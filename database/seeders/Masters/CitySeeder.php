<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CitySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/City.csv';
        $this->tablename = 'mst_city';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name', 'province_id'];
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_city ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_city OFF');
    }
}
