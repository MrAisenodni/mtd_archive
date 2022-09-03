<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PositionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Position.csv';
        $this->tablename = 'mst_position';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['code', 'name'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
