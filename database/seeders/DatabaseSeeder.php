<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            LocationSeeder::class,
            VendorSeeder::class,
            AssetStatusSeeder::class,
            AssetSeeder::class,
            // AssetAssignmentSeeder::class,
            MaintenanceTypeSeeder::class,
            MaintenanceSeeder::class,
            UserActivitySeeder::class,
            UserIpAddressSeeder::class,
        ]);

    }
}
