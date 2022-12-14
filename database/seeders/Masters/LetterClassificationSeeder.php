<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class LetterClassificationSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/LetterClassification.csv';
        $this->tablename = 'mst_letter_classification';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'name'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
