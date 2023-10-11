<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DepartmentGroupSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/DepartmentGroup.csv';
        $this->tablename = 'mst_department_group';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_department_group ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_department_group OFF');
    }
}
