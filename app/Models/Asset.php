<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    protected $fillable = [
        'asset_tag',
        'name',
        'quantity',
        'category_id',
        'vendor_id',
        'purchase_date',
        'warranty_expiry',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function assignments()
    {
        return $this->hasMany(AssetAssignment::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function ipAddresses()
    {
        return $this->hasMany(UserIpAddress::class);
    }


}
