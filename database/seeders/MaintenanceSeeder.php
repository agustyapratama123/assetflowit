<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maintenance;
use App\Models\Asset;
use App\Models\MaintenanceType;
use Carbon\Carbon;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        $assets = Asset::all();
        $types = MaintenanceType::all();

        if ($assets->isEmpty() || $types->isEmpty()) {
            $this->command->warn('Seeder tidak dijalankan karena asset atau maintenance type belum ada.');
            return;
        }

        foreach ($assets->take(5) as $asset) {
            Maintenance::create([
                'asset_id' => $asset->id,
                'maintenance_type_id' => $types->random()->id,
                'scheduled_at' => Carbon::now()->subDays(rand(10, 30)),
                'completed_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 9)) : null,
                'description' => 'Perawatan berkala untuk aset: ' . $asset->name,
            ]);
        }
    }
}
