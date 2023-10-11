<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SaveMethodSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/SaveMethod.csv';
        $this->tablename = 'mst_save_method';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_save_method ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_save_method OFF');
    }
}
