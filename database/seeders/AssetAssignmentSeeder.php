<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AssetAssignment;
use App\Models\Asset;
use App\Models\User;
use Carbon\Carbon;

class AssetAssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $asset = Asset::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();

        if (!$asset || !$user) {
            $this->command->warn('Seeder tidak dijalankan karena asset atau user belum ada.');
            return;
        }

        AssetAssignment::create([
            'asset_id' => $asset->id,
            'user_id' => $user->id,
            'assigned_at' => Carbon::now()->subDays(10),
            'returned_at' => null, // atau Carbon::now()->subDays(2) untuk simulasi sudah dikembalikan
            'note' => 'Digunakan untuk kegiatan operasional harian.',
        ]);
    }
}
