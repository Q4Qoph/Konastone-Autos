<?php

namespace Database\Seeders;

use App\Enums\VehicleStatus;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleFeature;
use App\Models\VehicleImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vehicles = [
            [
                'brand' => 'Honda', 'model' => 'Vezel Hybrid', 'trim' => null, 'year' => 2019,
                'price' => 2550000, 'mileage' => 76000, 'fuel_type' => 'hybrid', 'body_type' => 'suv',
                'exterior_color' => 'Modern Steel', 'drivetrain' => '2wd', 'engine_capacity' => 1500,
                'folder' => 'honda-vezel', 'featured' => true, 'negotiable' => false, 'financing' => false,
                'description' => 'Stylish 2018/19 Honda Vezel Hybrid in excellent condition. Features 1500cc hybrid engine with leather seats, push start ignition, paddle shift, reverse camera, parking sensors, xenon headlights, and alloy rims. Fuel-efficient compact SUV perfect for Nairobi roads.',
                'features' => ['Leather Seats', 'Push Start Ignition', 'Paddle Shift Transmission', 'Reverse Camera', 'Parking Sensors', 'Xenon Headlights', 'Fog Lights', 'Alloy Wheels', 'Multifunctional Steering Control', 'Hybrid Powertrain'],
            ],
            [
                'brand' => 'Toyota', 'model' => 'Land Cruiser Prado', 'trim' => 'TX.L', 'year' => 2019,
                'price' => 8000000, 'mileage' => 72000, 'fuel_type' => 'petrol', 'body_type' => 'suv',
                'exterior_color' => 'Pearl White', 'drivetrain' => '4wd', 'engine_capacity' => 2800,
                'folder' => 'toyota-prado-txl', 'featured' => true, 'negotiable' => false, 'financing' => false,
                'description' => 'Commanding 2019 Landcruiser Prado TX.L with 2800cc engine. Features 7 leather seats, panoramic sunroof, 360° surround camera, body kit, LED headlights, daylight running lights, fog lights, alloy rims, and multifunctional steering control.',
                'features' => ['7-Seater Leather Interior', 'Panoramic Sunroof', '360° Surround Camera', 'Body Kit', 'LED Headlights', 'Daylight Running Lights', 'Fog Lights', 'Alloy Wheels', 'Multifunctional Steering Control', '4WD Drivetrain'],
            ],
            [
                'brand' => 'Mazda', 'model' => '3 Petrol', 'trim' => null, 'year' => 2019,
                'price' => 2400000, 'mileage' => 74000, 'fuel_type' => 'petrol', 'body_type' => 'sedan',
                'exterior_color' => 'Machine Grey', 'drivetrain' => '2wd', 'engine_capacity' => 1500,
                'folder' => 'mazda-3', 'featured' => false, 'negotiable' => true, 'financing' => false,
                'description' => 'Sharp 2019 Mazda 3 with 1500cc engine. Equipped with multifunctional steering control, reverse camera, parking sensors, lane assist, daylight running lights, xenon headlights, fog lights, and alloy rims. Price is negotiable.',
                'features' => ['Reverse Camera', 'Parking Sensors', 'Lane Assist', 'Xenon Headlights', 'Daylight Running Lights', 'Fog Lights', 'Alloy Wheels', 'Multifunctional Steering Control'],
            ],
            [
                'brand' => 'Mazda', 'model' => 'Atenza', 'trim' => 'XDL', 'year' => 2019,
                'price' => 2600000, 'mileage' => 55000, 'fuel_type' => 'petrol', 'body_type' => 'sedan',
                'exterior_color' => 'Soul Red Crystal', 'drivetrain' => '2wd', 'engine_capacity' => 2200,
                'folder' => 'mazda-atenza', 'featured' => false, 'negotiable' => true, 'financing' => false,
                'description' => 'Executive 2019 Mazda Atenza XDL with 2200cc engine. Loaded with electric leather memory seats, push start ignition, 360° surround camera, Bose premium sound system, multifunctional steering, lane assist, xenon headlights, daylight running lights, fog lights, and alloy rims. Negotiable.',
                'features' => ['Electric Leather Memory Seats', 'Push Start Ignition', '360° Surround Camera', 'Bose Premium Sound System', 'Multifunctional Steering Control', 'Lane Assist', 'Xenon Headlights', 'Daylight Running Lights', 'Fog Lights', 'Alloy Wheels'],
            ],
            [
                'brand' => 'Mazda', 'model' => 'CX-5', 'trim' => 'XD L Package', 'year' => 2019,
                'price' => 3100000, 'mileage' => 68000, 'fuel_type' => 'diesel', 'body_type' => 'suv',
                'exterior_color' => 'Soul Red Crystal', 'drivetrain' => '4wd', 'engine_capacity' => 2200,
                'folder' => 'mazda-cx5', 'featured' => true, 'negotiable' => false, 'financing' => true,
                'description' => 'Flagship 2019 Mazda CX-5 XD L Package with 2200cc diesel engine. Loaded with keyless entry & start, full leather upholstery, Bose premium audio, power boot, Apple CarPlay/Android Auto, adaptive LED headlights, heads-up display, adaptive cruise control, lane-keep assist, blind spot monitoring, 360° bird\'s eye camera, dual-zone climate, heated front seats, heated steering wheel, navigation, and rain-sensing wipers. Deposit KES 1.5M, balance over 36 months.',
                'features' => ['Keyless Entry & Push Start', 'Full Leather Upholstery', 'Bose Premium Sound System', 'Power Boot', 'Apple CarPlay & Android Auto', 'Adaptive LED Headlights', 'Heads-Up Display', 'Adaptive Cruise Control', 'Lane-Keep Assist & Lane Departure Warning', 'Blind Spot Monitoring', '360° Bird\'s Eye Camera', 'Dual-Zone Climate Control', 'Heated Front Seats', 'Heated Steering Wheel', 'Navigation System', 'Rain-Sensing Wipers', 'Electric Parking Brake', 'Smart Brake Support'],
            ],
            [
                'brand' => 'Mercedes-Benz', 'model' => 'GLC', 'trim' => '220d', 'year' => 2019,
                'price' => 5800000, 'mileage' => 83000, 'fuel_type' => 'diesel', 'body_type' => 'suv',
                'exterior_color' => 'Obsidian Black', 'drivetrain' => 'awd', 'engine_capacity' => 2200,
                'folder' => 'mercedez-glc', 'featured' => true, 'negotiable' => false, 'financing' => false,
                'description' => 'Premium 2019 Mercedes-Benz GLC 220d with 2200cc diesel engine. Features panoramic sunroof, full leather interior, and new Nairobi registration. A refined luxury SUV at an exceptional price.',
                'features' => ['Panoramic Sunroof', 'Full Leather Interior', '2200cc Diesel Engine', 'New Nairobi Registration', 'AWD Drivetrain'],
            ],
            [
                'brand' => 'Subaru', 'model' => 'Forester', 'trim' => null, 'year' => 2019,
                'price' => 3400000, 'mileage' => 70000, 'fuel_type' => 'petrol', 'body_type' => 'suv',
                'exterior_color' => 'Crystal White', 'drivetrain' => 'awd', 'engine_capacity' => 2500,
                'folder' => 'subaru-forester', 'featured' => false, 'negotiable' => false, 'financing' => false,
                'description' => 'Reliable 2019 Subaru Forester with 2500cc engine. Features electric leather seats, multifunctional steering control, 360° surround camera, alloy rims, fog lights, and parking sensors. A trusted all-wheel-drive family SUV.',
                'features' => ['Electric Leather Seats', '360° Surround Camera', 'Multifunctional Steering Control', 'Alloy Wheels', 'Fog Lights', 'Parking Sensors', 'AWD Drivetrain'],
            ],
            [
                'brand' => 'Toyota', 'model' => 'Fielder', 'trim' => 'WXB Hybrid', 'year' => 2019,
                'price' => 2100000, 'mileage' => 60000, 'fuel_type' => 'hybrid', 'body_type' => 'wagon',
                'exterior_color' => 'Silver Metallic', 'drivetrain' => '2wd', 'engine_capacity' => 1500,
                'folder' => 'toyota-fielder-hybrid', 'featured' => false, 'negotiable' => false, 'financing' => false,
                'description' => 'Economical 2019 Toyota Fielder WXB Hybrid with 1500cc engine. Features full leather seats, alloy wheels, fog lights, and low running costs. An ideal family wagon with excellent fuel economy.',
                'features' => ['Leather Seats', 'Alloy Wheels', 'Fog Lights', 'Hybrid Powertrain', 'Automatic Transmission'],
            ],
            [
                'brand' => 'Toyota', 'model' => 'Harrier', 'trim' => 'Hybrid Premium', 'year' => 2019,
                'price' => 4200000, 'mileage' => 76000, 'fuel_type' => 'hybrid', 'body_type' => 'suv',
                'exterior_color' => 'Platinum White Pearl', 'drivetrain' => '2wd', 'engine_capacity' => null,
                'folder' => 'toyota-harrier', 'featured' => true, 'negotiable' => true, 'financing' => false,
                'description' => 'Sophisticated 2019 Toyota Harrier Hybrid Premium. Powered leather seats, powered boot, JBL premium sound system, multifunctional cruise control, daylight running lights, LED headlights, and fog lights. Negotiable.',
                'features' => ['Powered Leather Seats', 'Power Boot / Tailgate', 'JBL Premium Sound System', 'Multifunctional Cruise Control', 'Daylight Running Lights', 'LED Headlights', 'Fog Lights', 'Hybrid Powertrain'],
            ],
            [
                'brand' => 'Toyota', 'model' => 'Land Cruiser Prado', 'trim' => null, 'year' => 2019,
                'price' => 4000000, 'mileage' => 90000, 'fuel_type' => 'petrol', 'body_type' => 'suv',
                'exterior_color' => 'Granite Grey', 'drivetrain' => '4wd', 'engine_capacity' => 2800,
                'folder' => 'toyota-prado', 'featured' => false, 'negotiable' => false, 'financing' => false,
                'description' => 'Well-maintained 2019 Toyota Land Cruiser Prado with 2800cc petrol engine. Features leather seats, alloy wheels, and a sturdy 4WD drivetrain. A dependable off-road SUV with a proven track record.',
                'features' => ['Leather Seats', 'Alloy Wheels', '4WD Drivetrain', 'Automatic Transmission', 'Power Windows'],
            ],
            [
                'brand' => 'Volvo', 'model' => 'XC90', 'trim' => 'T5', 'year' => 2019,
                'price' => 6500000, 'mileage' => 65000, 'fuel_type' => 'petrol', 'body_type' => 'suv',
                'exterior_color' => 'Crystal White', 'drivetrain' => 'awd', 'engine_capacity' => 2000,
                'folder' => 'volvo-xc90-2019', 'featured' => true, 'negotiable' => true, 'financing' => false,
                'description' => 'Stunning 2019 Volvo XC90 T5 with 2.0L inline-4 turbocharged petrol engine. All-wheel drive with driving modes: Comfort, Eco, Dynamic Sport, Off-Road. Features 7 electric leather seats, memory seats, Scandinavian interior with wood accents, Harman Kardon premium audio, 9-inch Sensus touchscreen, Apple CarPlay, heads-up display, 360° surround camera, lane keeping aid, BLIS blind spot system, adaptive LED headlights, automatic tailgate, and multi-zone climate control. Negotiable.',
                'features' => ['7 Electric Leather Seats', 'Memory Seats', 'Harman Kardon Premium Sound System', '9-inch Sensus Touchscreen', 'Apple CarPlay & Android Auto', 'Heads-Up Display', '360° Surround Camera & Park Assist', 'Lane Keeping Aid & BLIS Blind Spot System', 'Adaptive LED Headlights', 'Automatic Tailgate', 'Multi-Zone Climate Control', 'Scandinavian Wood Accent Interior', 'Ambient Lighting', 'AWD with Driving Modes (Comfort / Eco / Sport / Off-Road)'],
            ],
            [
                'brand' => 'Volvo', 'model' => 'XC90', 'trim' => 'B6', 'year' => 2022,
                'price' => 11500000, 'mileage' => 53530, 'fuel_type' => 'petrol', 'body_type' => 'suv',
                'exterior_color' => 'Crystal White', 'drivetrain' => 'awd', 'engine_capacity' => null,
                'folder' => 'volvo-xc90-2022', 'featured' => true, 'negotiable' => false, 'financing' => false,
                'description' => 'Prestigious 2022 Volvo XC90 B6 in pristine condition. 7-seater AWD with sunroof, roof rail, leather seats, cruise control, push start, multi-function steering, smart key, TV/navigation system, privacy glass, rear spoiler, anti-lock brakes, auto air conditioning, power windows, power steering, alloy wheels, fog lights, and airbags.',
                'features' => ['7-Seater Configuration', 'Panoramic Sunroof', 'Roof Rails', 'Leather Seats', 'Cruise Control', 'Push Start Ignition', 'Smart Key', 'Multi-Function Steering', 'TV & Navigation System', 'Privacy Glass', 'Auto Air Conditioning', 'Power Windows & Steering', 'Alloy Wheels', 'Fog Lights', 'Anti-Lock Brakes', 'Airbag System', 'AWD Drivetrain'],
            ],
        ];

        foreach ($vehicles as $index => $vehicleData) {
            $brand = Brand::query()->where('slug', str($vehicleData['brand'])->slug())->firstOrFail();
            $stockNumber = 'KON-'.str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT);

            $vehicle = Vehicle::query()->updateOrCreate(
                ['stock_number' => $stockNumber],
                [
                    'brand_id' => $brand->id,
                    'model' => $vehicleData['model'],
                    'trim' => $vehicleData['trim'],
                    'slug' => str("{$vehicleData['year']}-{$vehicleData['brand']}-{$vehicleData['model']}-{$vehicleData['trim']}-{$stockNumber}")->slug(),
                    'year' => $vehicleData['year'],
                    'condition' => 'foreign_used',
                    'engine' => $vehicleData['engine_capacity'] ? number_format($vehicleData['engine_capacity']).'cc '.ucfirst($vehicleData['fuel_type']) : null,
                    'engine_capacity' => $vehicleData['engine_capacity'],
                    'cylinders' => null,
                    'doors' => null,
                    'fuel_type' => $vehicleData['fuel_type'],
                    'transmission' => 'automatic',
                    'drivetrain' => $vehicleData['drivetrain'],
                    'body_type' => $vehicleData['body_type'],
                    'mileage' => $vehicleData['mileage'],
                    'exterior_color' => $vehicleData['exterior_color'],
                    'interior_color' => null,
                    'price' => $vehicleData['price'],
                    'previous_price' => null,
                    'currency' => 'KES',
                    'description' => $vehicleData['description'],
                    'location' => 'Kenya',
                    'status' => VehicleStatus::Available,
                    'is_featured' => $vehicleData['featured'],
                    'is_negotiable' => $vehicleData['negotiable'],
                    'financing_available' => $vehicleData['financing'],
                    'published_at' => now()->subDays($index + 1),
                    'sold_at' => null,
                ],
            );

            $vehicle->features()->delete();
            foreach ($vehicleData['features'] as $featureName) {
                VehicleFeature::query()->create([
                    'vehicle_id' => $vehicle->id,
                    'name' => $featureName,
                ]);
            }

            $vehicle->images()->delete();
            $imagePaths = collect(File::files(public_path("assets/img/inventory/{$vehicleData['folder']}")))
                ->sortBy(fn (\SplFileInfo $image): string => $image->getFilename(), SORT_NATURAL)
                ->values();

            foreach ($imagePaths as $sortOrder => $image) {
                $imagePath = $image->getPathname();
                $dimensions = getimagesize($imagePath);

                VehicleImage::query()->create([
                    'vehicle_id' => $vehicle->id,
                    'disk' => 'public',
                    'path' => "img/inventory/{$vehicleData['folder']}/{$image->getFilename()}",
                    'original_name' => $image->getFilename(),
                    'mime_type' => File::mimeType($imagePath),
                    'file_size' => File::size($imagePath),
                    'width' => $dimensions[0] ?? null,
                    'height' => $dimensions[1] ?? null,
                    'checksum' => hash_file('sha256', $imagePath),
                    'alt_text' => "{$vehicleData['year']} {$vehicleData['brand']} {$vehicleData['model']} {$vehicleData['trim']}",
                    'sort_order' => $sortOrder,
                    'is_cover' => $sortOrder === 0,
                ]);
            }
        }
    }
}
