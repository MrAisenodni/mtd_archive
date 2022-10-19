<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class LetterStatusSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/LetterStatus.csv';
        $this->tablename = 'mst_letter_status';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name', 'back_color', 'fore_color', 'main_status'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
