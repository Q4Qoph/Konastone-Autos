<?php

namespace App\Models;

use Database\Factories\VehicleFeatureFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['vehicle_id', 'name'])]
class VehicleFeature extends Model
{
    /** @use HasFactory<VehicleFeatureFactory> */
    use HasFactory;

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
