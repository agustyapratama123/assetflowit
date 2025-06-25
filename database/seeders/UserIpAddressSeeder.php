<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserIpAddress;
use App\Models\User;
use App\Models\Asset;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserIpAddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $assets = Asset::all();

        if ($users->isEmpty()) {
            $this->command->warn('Seeder gagal: Tidak ada user.');
            return;
        }

        $ipBase = '192.168.1.';

        foreach ($users as $user) {
            $ipLast = rand(10, 250);
            $ip = $ipBase . $ipLast;

            UserIpAddress::updateOrCreate(
                ['ip_address' => $ip],
                [
                    'user_id' => $user->id,
                    'asset_id' => $assets->random()->id ?? null,
                    'assigned_at' => Carbon::now()->subDays(rand(1, 30)),
                    'released_at' => rand(0, 1) ? Carbon::now()->subDays(rand(0, 5)) : null,
                    'notes' => 'IP digunakan untuk workstation harian.',
                ]
            );
        }
    }
}
