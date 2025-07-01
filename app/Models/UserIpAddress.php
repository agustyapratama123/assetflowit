<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserIpAddress extends Model
{
    protected $fillable = [
        'user_id',
        'ip_address',
        'asset_id',
        'category_id',
        'location_id',
        'assigned_at',
        'released_at',
        'notes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
