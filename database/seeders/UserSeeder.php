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
                'password' => 'password',
            ],
            [
                'name' => 'Teknisi Aset',
                'email' => 'technician@example.com',
                'role' => 'technician',
                'password' => 'password',
            ],
            [
                'name' => 'Karyawan Umum',
                'email' => 'employee@example.com',
                'role' => 'employee',
                'password' => 'password',
            ],
            [
                'name' => 'Auditor Sistem',
                'email' => 'auditor@example.com',
                'role' => 'auditor',
                'password' => 'password',
            ],
            [
                'name' => 'Manajer Divisi',
                'email' => 'manager@example.com',
                'role' => 'manager',
                'password' => 'password',
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
