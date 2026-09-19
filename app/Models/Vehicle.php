<?php

namespace App\Models;

use App\Enums\VehicleStatus;
use Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

#[Fillable(['brand_id', 'model', 'trim', 'slug', 'year', 'condition', 'stock_number', 'chassis_number', 'engine', 'engine_capacity', 'fuel_type', 'transmission', 'drivetrain', 'body_type', 'mileage', 'exterior_color', 'interior_color', 'price', 'previous_price', 'currency', 'description', 'location', 'status', 'is_featured', 'is_negotiable', 'financing_available', 'published_at', 'sold_at'])]
class Vehicle extends Model
{
    /** @use HasFactory<VehicleFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'status' => VehicleStatus::class,
            'price' => 'decimal:2',
            'previous_price' => 'decimal:2',
            'is_featured' => 'boolean',
            'is_negotiable' => 'boolean',
            'financing_available' => 'boolean',
            'published_at' => 'datetime',
            'sold_at' => 'datetime',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function images(): HasMany
    {
        return $this->hasMany(VehicleImage::class)->orderBy('sort_order');
    }

    public function coverImage(): HasOne
    {
        return $this->hasOne(VehicleImage::class)->where('is_cover', true);
    }

    public function features(): HasMany
    {
        return $this->hasMany(VehicleFeature::class)->orderBy('name');
    }

    public function scopeAvailable(Builder $query): void
    {
        $query->where('status', VehicleStatus::Available->value);
    }

    public function scopeFeatured(Builder $query): void
    {
        $query->where('is_featured', true);
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at')->where('published_at', '<=', Carbon::now());
    }
}
