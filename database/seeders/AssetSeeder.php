<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Location;
use App\Models\User;
use App\Models\AssetStatus;
use Illuminate\Support\Str;

class AssetSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();
        $vendor = Vendor::first();
        $location = Location::first();
        $user = User::first();
        $status = AssetStatus::where('name', 'active')->first();

        if (!($category && $vendor && $location && $user && $status)) {
            $this->command->warn('Seeder tidak dijalankan karena salah satu relasi belum ada data.');
            return;
        }

        Asset::create([
            'asset_tag' => 'ASSET-' . strtoupper(Str::random(6)),
            'name' => 'Laptop Dell Latitude 5420',
            'category_id' => $category->id,
            'vendor_id' => $vendor->id,
            // 'location_id' => $location->id,
            // 'user_id' => $user->id,
            // 'asset_status_id' => $status->id,
            'purchase_date' => now()->subYears(1)->format('Y-m-d'),
            'warranty_expiry' => now()->addYears(1)->format('Y-m-d'),
            'description' => 'Laptop untuk kebutuhan IT Support',
        ]);
    }
}
