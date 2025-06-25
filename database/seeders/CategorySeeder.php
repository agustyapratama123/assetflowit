<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Laptop',
                'description' => 'Perangkat komputer portabel untuk staf dan operasional',
            ],
            [
                'name' => 'Router',
                'description' => 'Perangkat jaringan untuk distribusi koneksi internet',
            ],
            [
                'name' => 'Switch',
                'description' => 'Perangkat jaringan untuk konektivitas LAN',
            ],
            [
                'name' => 'Server',
                'description' => 'Unit server fisik atau virtual untuk layanan internal',
            ],
            [
                'name' => 'Printer',
                'description' => 'Perangkat cetak untuk dokumen internal',
            ],
            [
                'name' => 'Scanner',
                'description' => 'Perangkat pemindai dokumen',
            ],
            [
                'name' => 'Software',
                'description' => 'Lisensi aplikasi atau sistem operasional',
            ],
            [
                'name' => 'Kamera CCTV',
                'description' => 'Perangkat pengawasan keamanan',
            ],
            [
                'name' => 'Akses Pintu',
                'description' => 'Sistem kontrol akses untuk pintu',
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['name' => $category['name']], $category);
        }
    }
}
