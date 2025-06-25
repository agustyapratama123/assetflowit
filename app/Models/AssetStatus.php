<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetStatus extends Model
{
    protected $fillable = ['name'];

    // Tambahkan relasi ke aset jika dibutuhkan
    // public function assets()
    // {
    //     return $this->hasMany(Asset::class);
    // }

    public function assets()
    {
        return $this->hasMany(Asset::class, 'asset_status_id');
    }

}
