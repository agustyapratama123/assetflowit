<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'phone',
        'email',
        'address',
    ];

    // Tambahkan relasi jika nanti vendor terkait dengan asset, kontrak, atau garansi
}
