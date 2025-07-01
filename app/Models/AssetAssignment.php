<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetAssignment extends Model
{
    protected $fillable = [
        'asset_id',
        'user_id',
        'location_id',
        'asset_status_id',
        'assigned_at',
        'returned_at',
        'note',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(AssetStatus::class, 'asset_status_id');
    }

    
}
