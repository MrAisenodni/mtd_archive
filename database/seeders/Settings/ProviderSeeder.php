<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ProviderSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Provider.csv';
        $this->tablename = 'stg_provider';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['provider_npwp', 'provider_name', 'provider_birth_place', 'provider_birth_date', 'provider_email', 'provider_logo', 'provider_picture', 'owner_npwp', 'owner_nik', 'owner_name', 'owner_birth_place', 'owner_birth_date', 'owner_email', 'owner_address_1', 'owner_address_2', 'owner_address_3', 'owner_ward_id'];
        $this->header = false;
    }

    public function run()
    {
        parent::run();
    }
}
