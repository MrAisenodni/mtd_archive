<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ProvinceSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Province.csv';
        $this->tablename = 'mst_province';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name', 'country_id'];
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_province ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_province OFF');
    }
}
