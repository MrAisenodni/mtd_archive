<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class SubMenuSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/SubMenu.csv';
        $this->tablename = 'stg_submenu';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['title', 'url', 'icon', 'menu_id'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
