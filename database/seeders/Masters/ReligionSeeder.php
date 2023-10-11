<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ReligionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Religion.csv';
        $this->tablename = 'mst_religion';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_religion ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_religion OFF');
    }
}
