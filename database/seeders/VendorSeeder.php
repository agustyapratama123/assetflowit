<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    public function run(): void
    {
        $vendors = [
            [
                'name' => 'PT. Teknologi Nusantara',
                'contact_person' => 'Budi Santoso',
                'phone' => '081234567890',
                'email' => 'budi@teknologinusantara.co.id',
                'address' => 'Jl. Gatot Subroto No. 12, Jakarta Selatan',
            ],
            [
                'name' => 'CV. Sumber Hardware',
                'contact_person' => 'Sinta Dewi',
                'phone' => '082112345678',
                'email' => 'sinta@sumberhardware.co.id',
                'address' => 'Jl. Merdeka Barat No. 45, Bandung',
            ],
            [
                'name' => 'PT. Solusi Software Indonesia',
                'contact_person' => 'Andi Wijaya',
                'phone' => '085711223344',
                'email' => 'andi@solusisoftware.id',
                'address' => 'Jl. Sudirman No. 99, Surabaya',
            ],
            [
                'name' => 'MegaNet Komputindo',
                'contact_person' => 'Rina Kartika',
                'phone' => '087800112233',
                'email' => 'rina@meganet.co.id',
                'address' => 'Kompleks Niaga Blok C2 No. 7, Yogyakarta',
            ],
        ];

        foreach ($vendors as $vendor) {
            Vendor::updateOrCreate(['email' => $vendor['email']], $vendor);
        }
    }
}
