<?php

namespace App\Http\Controllers;

use App\Enums\VehicleStatus;
use App\Http\Requests\InventoryFilterRequest;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function index(InventoryFilterRequest $request): View
    {
        return $this->listing($request, 'list', 'pages.inventory-listing');
    }

    public function grid(InventoryFilterRequest $request): View
    {
        return $this->listing($request, 'grid', 'pages.inventory-grid');
    }

    public function sold(): View
    {
        $vehicles = $this->baseQuery()
            ->where('status', VehicleStatus::Sold)
            ->orderByDesc('sold_at')
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();

        return view('pages.inventory-sold', compact('vehicles'));
    }

    public function show(Vehicle $vehicle): View
    {
        abort_unless(
            $vehicle->published_at?->isPast() &&
            in_array($vehicle->status, [VehicleStatus::Available, VehicleStatus::Reserved, VehicleStatus::Sold], true) &&
            $vehicle->brand()->where('is_active', true)->exists(),
            404,
        );

        $vehicle->load(['brand', 'images', 'features']);

        $relatedVehicles = $this->baseQuery()
            ->where('status', VehicleStatus::Available->value)
            ->whereKeyNot($vehicle->id)
            ->where(function (Builder $query) use ($vehicle): void {
                $query->where('brand_id', $vehicle->brand_id)
                    ->orWhere('body_type', $vehicle->body_type);
            })
            ->latest('published_at')
            ->limit(4)
            ->get();

        return view('pages.single-inventory', compact('vehicle', 'relatedVehicles'));
    }

    private function listing(InventoryFilterRequest $request, string $viewMode, string $view): View
    {
        $filters = $request->validated();
        $query = $this->baseQuery()->where('status', VehicleStatus::Available->value);

        $query->when(filled($filters['brand'] ?? null), fn (Builder $q) => $q->whereHas('brand', fn (Builder $brand) => $brand->where('slug', str($filters['brand'])->slug())));
        $query->when(filled($filters['model'] ?? null), fn (Builder $q) => $q->where('model', 'like', '%'.$filters['model'].'%'));
        $query->when(filled($filters['condition'] ?? null), fn (Builder $q) => $q->where('condition', $filters['condition']));
        $query->when(filled($filters['exterior_color'] ?? null), fn (Builder $q) => $q->where('exterior_color', $filters['exterior_color']));
        $query->when(filled($filters['body_type'] ?? null), fn (Builder $q) => $q->where('body_type', str($filters['body_type'])->lower()));
        $query->when(filled($filters['drivetrain'] ?? null), fn (Builder $q) => $q->where('drivetrain', $filters['drivetrain']));
        $query->when(filled($filters['transmission'] ?? null), fn (Builder $q) => $q->where('transmission', $filters['transmission']));
        $query->when(filled($filters['fuel_type'] ?? null), fn (Builder $q) => $q->where('fuel_type', $filters['fuel_type']));
        $query->when(filled($filters['min_price'] ?? null), fn (Builder $q) => $q->where('price', '>=', $filters['min_price']));
        $query->when(filled($filters['max_price'] ?? null), fn (Builder $q) => $q->where('price', '<=', $filters['max_price']));
        $query->when(filled($filters['min_year'] ?? null), fn (Builder $q) => $q->where('year', '>=', $filters['min_year']));
        $query->when(filled($filters['max_year'] ?? null), fn (Builder $q) => $q->where('year', '<=', $filters['max_year']));
        $query->when(filled($filters['max_mileage'] ?? null), fn (Builder $q) => $q->where('mileage', '<=', $filters['max_mileage']));

        match ($filters['sort'] ?? 'newest') {
            'price_low' => $query->orderBy('price')->orderByDesc('id'),
            'price_high' => $query->orderByDesc('price')->orderByDesc('id'),
            'year' => $query->orderByDesc('year')->orderByDesc('id'),
            'mileage' => $query->orderByRaw('mileage IS NULL')->orderBy('mileage')->orderByDesc('id'),
            default => $query->latest('published_at')->latest('id'),
        };

        return view($view, [
            'vehicles' => $query->paginate(12)->withQueryString(),
            'viewMode' => $viewMode,
            'filters' => $filters,
        ]);
    }

    private function baseQuery(): Builder
    {
        return Vehicle::query()
            ->with(['brand', 'coverImage'])
            ->whereHas('brand', fn (Builder $query) => $query->where('is_active', true))
            ->published();
    }
}
