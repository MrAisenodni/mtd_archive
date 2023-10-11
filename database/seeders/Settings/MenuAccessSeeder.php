<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class MenuAccessSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/MenuAccess.csv';
        $this->tablename = 'stg_menu_access';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'login_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail'];
        $this->header = false;
    }

    public function run()
    {
        DB::unprepared('SET IDENTITY_INSERT stg_menu_access ON');
        parent::run();
        DB::unprepared('SET IDENTITY_INSERT stg_menu_access OFF');
    }
}
