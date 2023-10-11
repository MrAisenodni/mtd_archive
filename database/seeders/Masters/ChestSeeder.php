<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ChestSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Chest.csv';
        $this->tablename = 'mst_chest';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name'];
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_chest ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_chest OFF');
    }
}
