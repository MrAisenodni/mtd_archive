<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CompanySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Company.csv';
        $this->tablename = 'mst_company';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'code', 'name'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
