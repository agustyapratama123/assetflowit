<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'admin', 'description' => 'Akses penuh, konfigurasi sistem'],
            ['name' => 'technician', 'description' => 'Operasional lapangan'],
            ['name' => 'employee', 'description' => 'Pengguna aset & pelapor kegiatan'],
            ['name' => 'auditor', 'description' => 'Pemeriksa histori dan pelaporan'],
            ['name' => 'manager', 'description' => 'Pemantau kegiatan & kepemilikan aset'],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role['name']], $role);
        }
    }
}
