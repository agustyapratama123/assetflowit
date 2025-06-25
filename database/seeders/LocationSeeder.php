<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $gedungA = Location::create(['name' => 'Gedung A']);
        
        $lantai1 = Location::create([
            'name' => 'Lantai 1',
            'parent_id' => $gedungA->id,
        ]);

        $lantai2 = Location::create([
            'name' => 'Lantai 2',
            'parent_id' => $gedungA->id,
        ]);

        Location::create([
            'name' => 'Ruang Server',
            'parent_id' => $lantai2->id,
        ]);

        Location::create([
            'name' => 'Gudang Pusat',
            'parent_id' => null,
        ]);
    }
}
