<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin System',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'password' => 'password123',
            ],
            [
                'name' => 'Teknisi Aset',
                'email' => 'technician@example.com',
                'role' => 'technician',
                'password' => 'password123',
            ],
            [
                'name' => 'Karyawan Umum',
                'email' => 'employee@example.com',
                'role' => 'employee',
                'password' => 'password123',
            ],
            [
                'name' => 'Auditor Sistem',
                'email' => 'auditor@example.com',
                'role' => 'auditor',
                'password' => 'password123',
            ],
            [
                'name' => 'Manajer Divisi',
                'email' => 'manager@example.com',
                'role' => 'manager',
                'password' => 'password123',
            ],
        ];

        foreach ($users as $data) {
            $role = Role::where('name', $data['role'])->first();

            if ($role) {
                User::updateOrCreate(
                    ['email' => $data['email']],
                    [
                        'name' => $data['name'],
                        'role_id' => $role->id,
                        'password' => Hash::make($data['password']),
                        'email_verified_at' => now(),
                    ]
                );
            }
        }
    }
}
