<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DepartmentSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Department.csv';
        $this->tablename = 'mst_department';
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
