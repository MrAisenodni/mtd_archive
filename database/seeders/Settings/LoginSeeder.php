<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class LoginSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/Login.csv';
        $this->tablename = 'stg_login';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'username', 'password', 'user_id'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT stg_login ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT stg_login OFF');
    }
}
