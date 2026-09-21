<?php

use App\Enums\VehicleStatus;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

Route::get('/', function () {
    $featuredVehicles = collect();

    if (Schema::hasTable('vehicles')) {
        $featuredVehicles = Vehicle::query()
            ->with(['brand', 'coverImage', 'images'])
            ->where('is_featured', true)
            ->where('status', VehicleStatus::Available->value)
            ->whereHas('brand', fn (Builder $query) => $query->where('is_active', true))
            ->published()
            ->latest('published_at')
            ->limit(8)
            ->get();
    }

    return view('pages.home', compact('featuredVehicles'));
})->name('home');

Route::get('/inventory', [VehicleController::class, 'index'])
    ->name('inventory.index');

Route::get('/inventory-grid', [VehicleController::class, 'grid'])
    ->name('inventory.grid');

Route::get('/inventory-sold', [VehicleController::class, 'sold'])
    ->name('inventory.sold');

Route::get('/inventory/{vehicle:slug}', [VehicleController::class, 'show'])
    ->name('inventory.show');

Route::view('/finance-calculator', 'pages.finance-calculator')
    ->name('finance.calculator');

Route::view('/sell-a-car', 'pages.sell-a-car')
    ->name('sell.car');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact')->name('contact.store');
