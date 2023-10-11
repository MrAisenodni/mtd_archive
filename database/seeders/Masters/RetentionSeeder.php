<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class RetentionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Retention.csv';
        $this->tablename = 'mst_retention';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'time', 'type'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_retention ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_retention OFF');
    }
}
