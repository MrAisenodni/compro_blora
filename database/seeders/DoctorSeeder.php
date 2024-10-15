<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DoctorSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Doctor.csv';
        $this->tablename = 'mst_doctor';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
    }

    public function run()
    {
        parent::run();
    }
}
