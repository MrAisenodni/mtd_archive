<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class MenuAccessSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/MenuAccess.csv';
        $this->tablename = 'stg_menu_access';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['login_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
