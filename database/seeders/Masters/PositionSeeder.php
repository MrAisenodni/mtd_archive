<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PositionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Position.csv';
        $this->tablename = 'mst_position';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'code', 'name'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_position ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_position OFF');
    }
}
