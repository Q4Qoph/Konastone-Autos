<?php

namespace App\Models;

use Database\Factories\VehicleImageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'vehicle_id',
    'disk',
    'path',
    'original_name',
    'mime_type',
    'file_size',
    'width',
    'height',
    'checksum',
    'variants',
    'uploaded_by',
    'alt_text',
    'sort_order',
    'is_cover',
])]
class VehicleImage extends Model
{
    /** @use HasFactory<VehicleImageFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'file_size' => 'integer',
            'width' => 'integer',
            'height' => 'integer',
            'variants' => 'array',
            'is_cover' => 'boolean',
        ];
    }

    public function url(?string $variant = null): string
    {
        $path = $this->pathForVariant($variant);

        if (str_starts_with($path, 'img/')) {
            return asset('assets/'.$path);
        }

        return Storage::disk($this->disk ?: 'public')->url($path);
    }

    public function pathForVariant(?string $variant = null): string
    {
        if ($variant !== null && is_array($this->variants) && filled($this->variants[$variant] ?? null)) {
            return (string) $this->variants[$variant];
        }

        return $this->path;
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function uploadedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}
