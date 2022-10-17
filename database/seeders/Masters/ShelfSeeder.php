<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ShelfSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Shelf.csv';
        $this->tablename = 'mst_shelf';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name', 'chest_id'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
