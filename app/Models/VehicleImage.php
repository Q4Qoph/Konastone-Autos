<?php

namespace App\Models;

use Database\Factories\VehicleImageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['vehicle_id', 'path', 'alt_text', 'sort_order', 'is_cover'])]
class VehicleImage extends Model
{
    /** @use HasFactory<VehicleImageFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return ['is_cover' => 'boolean'];
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
