<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CompanySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Company.csv';
        $this->tablename = 'mst_company';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'code', 'name', 'address_1', 'phone_no_1', 'phone_no_2', 'email'];
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT mst_company ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT mst_company OFF');
    }
}
