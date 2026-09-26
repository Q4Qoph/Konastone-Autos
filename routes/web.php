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
    $exploreBrands = [
        ['name' => 'Audi', 'slug' => 'audi', 'image' => 'audi.webp'],
        ['name' => 'BMW', 'slug' => 'bmw', 'image' => 'bmw.png'],
        ['name' => 'Chevrolet', 'slug' => 'chevrolet', 'image' => 'chevrolet.webp'],
        ['name' => 'Chrysler', 'slug' => 'chrysler', 'image' => 'chrysler.webp'],
        ['name' => 'Dodge', 'slug' => 'dodge', 'image' => 'dodge.webp'],
        ['name' => 'Ford', 'slug' => 'ford', 'image' => 'ford.webp'],
        ['name' => 'Haval', 'slug' => 'haval', 'image' => 'haval.png'],
        ['name' => 'Honda', 'slug' => 'honda', 'image' => 'honda.webp'],
        ['name' => 'Hyundai', 'slug' => 'hyundai', 'image' => 'hyundai.webp'],
        ['name' => 'Infiniti', 'slug' => 'infiniti', 'image' => 'infiniti.webp'],
        ['name' => 'Isuzu', 'slug' => 'isuzu', 'image' => 'isuzu.webp'],
        ['name' => 'Jeep', 'slug' => 'jeep', 'image' => 'jeep.webp'],
        ['name' => 'Kia', 'slug' => 'kia', 'image' => 'kia.webp'],
        ['name' => 'Land Rover', 'slug' => 'land-rover', 'image' => 'land-rover.webp'],
        ['name' => 'Lexus', 'slug' => 'lexus', 'image' => 'lexus.png'],
        ['name' => 'Mazda', 'slug' => 'mazda', 'image' => 'mazda.webp'],
        ['name' => 'Mercedes-Benz', 'slug' => 'mercedes-benz', 'image' => 'mercedes-benz.webp'],
        ['name' => 'Mitsubishi', 'slug' => 'mitsubishi', 'image' => 'mitsubishi.webp'],
        ['name' => 'Nissan', 'slug' => 'nissan', 'image' => 'nissan.webp'],
        ['name' => 'Peugeot', 'slug' => 'peugeot', 'image' => 'peugeot.webp'],
        ['name' => 'Porsche', 'slug' => 'porsche', 'image' => 'porsche.webp'],
        ['name' => 'Ram', 'slug' => 'ram', 'image' => 'ram.webp'],
        ['name' => 'Renault', 'slug' => 'renault', 'image' => 'renault.webp'],
        ['name' => 'Subaru', 'slug' => 'subaru', 'image' => 'subaru.webp'],
        ['name' => 'Suzuki', 'slug' => 'suzuki', 'image' => 'suzuki.webp'],
        ['name' => 'Toyota', 'slug' => 'toyota', 'image' => 'toyota.webp'],
        ['name' => 'Volkswagen', 'slug' => 'volkswagen', 'image' => 'volkswagen.png'],
        ['name' => 'Volvo', 'slug' => 'volvo', 'image' => 'volvo.webp'],
    ];

    if (Schema::hasTable('vehicles')) {
        $featuredVehicles = Vehicle::query()
            ->with(['brand', 'coverImage', 'images'])
            ->where('status', VehicleStatus::Available->value)
            ->whereHas('brand', fn (Builder $query) => $query->where('is_active', true))
            ->published()
            ->orderByDesc('is_featured')
            ->latest('published_at')
            ->limit(8)
            ->get();
    }

    return view('pages.home', compact('featuredVehicles', 'exploreBrands'));
})->name('home');

Route::view('/about', 'pages.about')->name('about');

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
