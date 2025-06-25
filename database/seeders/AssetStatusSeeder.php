<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetStatus;

class AssetStatusSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = [
            'active',
            'inactive',
            'maintenance',
            'retired',
        ];

        foreach ($statuses as $name) {
            AssetStatus::updateOrCreate(['name' => $name]);
        }
    }
}
