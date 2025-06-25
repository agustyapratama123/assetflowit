<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    protected $fillable = ['name'];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

}
