<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaintenanceType;

class MaintenanceTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Preventive',
            'Repair',
            'Downtime',
        ];

        foreach ($types as $type) {
            MaintenanceType::updateOrCreate(['name' => $type]);
        }
    }
}
