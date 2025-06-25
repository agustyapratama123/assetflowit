<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserActivity;
use App\Models\User;
use Carbon\Carbon;

class UserActivitySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        if ($users->isEmpty()) {
            $this->command->warn('Tidak ada user ditemukan. Seeder aktivitas tidak dijalankan.');
            return;
        }

        $activities = [
            'Memperbaiki koneksi internet di ruang administrasi',
            'Menginstall ulang sistem operasi pada komputer rawat jalan',
            'Mengganti kabel LAN yang rusak',
            'Melakukan backup data harian server',
            'Membantu user login ke SIMRS',
            'Membersihkan printer dan mengatasi kertas macet',
            'Mengkonfigurasi IP address untuk komputer baru',
            'Membuat akun email untuk karyawan baru',
            'Menghubungkan printer ke jaringan lokal',
            'Melakukan update antivirus di semua PC lab',
        ];

        foreach ($users as $user) {
            for ($i = 0; $i < 5; $i++) {
                UserActivity::create([
                    'user_id' => $user->id,
                    'activity_date' => Carbon::now()->subDays(rand(0, 10)),
                    'description' => $activities[array_rand($activities)],
                ]);
            }
        }
    }
}
