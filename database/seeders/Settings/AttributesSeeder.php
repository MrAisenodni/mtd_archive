<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class AttributesSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/Attributes.csv';
        $this->tablename = 'stg_attributes';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'field_name', 'description'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT stg_attributes ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT stg_attributes OFF');
    }
}
