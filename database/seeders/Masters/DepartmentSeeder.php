<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DepartmentSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Department.csv';
        $this->tablename = 'mst_department';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'code', 'name', 'group_id'];
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_department ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_department OFF');
    }
}
