<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SubMenuSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/SubMenu.csv';
        $this->tablename = 'stg_submenu';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'title', 'url', 'icon', 'menu_id'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT stg_submenu ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT stg_submenu OFF');
    }
}
