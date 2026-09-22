# Stakeholder demo data handoff

This note records which information from the previous Konastone Autos project is loaded into this Laravel rebuild, the assumptions made to make a working demo, and what to confirm with stakeholders afterwards.

## What is included

The demo seed loads 12 listings from the previous project's `supabase_seed.sql` into the current `vehicles`, `brands`, `vehicle_features`, and `vehicle_images` tables. It includes the listed prices, mileage, model year, fuel, transmission, body type, colour, drivetrain, descriptions, feature lists, and featured status.

The matching image folders from the previous project are included under `public/assets/img/inventory/`:

| Folder | Listing |
| --- | --- |
| `honda-vezel` | 2019 Honda Vezel Hybrid |
| `toyota-prado-txl` | 2019 Toyota Land Cruiser Prado TX.L |
| `mazda-3` | 2019 Mazda 3 Petrol |
| `mazda-atenza` | 2019 Mazda Atenza XDL |
| `mazda-cx5` | 2019 Mazda CX-5 XD L Package |
| `mercedez-glc` | 2019 Mercedes-Benz GLC 220d |
| `subaru-forester` | 2019 Subaru Forester |
| `toyota-fielder-hybrid` | 2019 Toyota Fielder WXB Hybrid |
| `toyota-harrier` | 2019 Toyota Harrier Hybrid Premium |
| `toyota-prado` | 2019 Toyota Land Cruiser Prado |
| `volvo-xc90-2019` | 2019 Volvo XC90 T5 |
| `volvo-xc90-2022` | 2022 Volvo XC90 B6 |

There are 225 image files across these folders. The seeder registers every image in its matching vehicle gallery and marks the first naturally sorted image as the cover. Image paths use the existing `img/...` convention, which the current `VehicleImage` model serves from the public assets directory.

The seeded makes are Toyota, Honda, Mazda, Mercedes-Benz, Subaru, and Volvo. Vehicle descriptions and feature lists are carried over from the old SQL seed to preserve useful sales copy for stakeholder review.

The old catalogue lists the following asking prices and mileages, which are copied into the demo seed:

| Vehicle | Year | Price (KES) | Mileage (km) |
| --- | ---: | ---: | ---: |
| Honda Vezel Hybrid | 2019 | 2,550,000 | 76,000 |
| Toyota Land Cruiser Prado TX.L | 2019 | 8,000,000 | 72,000 |
| Mazda 3 Petrol | 2019 | 2,400,000 | 74,000 |
| Mazda Atenza XDL | 2019 | 2,600,000 | 55,000 |
| Mazda CX-5 XD L Package | 2019 | 3,100,000 | 68,000 |
| Mercedes-Benz GLC 220d | 2019 | 5,800,000 | 83,000 |
| Subaru Forester | 2019 | 3,400,000 | 70,000 |
| Toyota Fielder WXB Hybrid | 2019 | 2,100,000 | 60,000 |
| Toyota Harrier Hybrid Premium | 2019 | 4,200,000 | 76,000 |
| Toyota Land Cruiser Prado | 2019 | 4,000,000 | 90,000 |
| Volvo XC90 T5 | 2019 | 6,500,000 | 65,000 |
| Volvo XC90 B6 | 2022 | 11,500,000 | 53,530 |

## Demo assumptions to review

The previous dataset does not provide all fields required by the current app. The seeder fills those fields as follows so the demo works end to end:

- All 12 vehicles are marked `available` and published. The old seed marked all of them available, but their real status today is unknown.
- All vehicles use `foreign_used` condition because the source does not identify local versus foreign use consistently. Confirm each listing's condition.
- All vehicles use automatic transmission because the source lists automatic for the catalogue as a whole, rather than per listing.
- All vehicles are assigned the location `Kenya`; the source only gives a Nairobi reference for some vehicles.
- Missing engine capacities remain blank. Cylinder count, doors, and interior colour remain blank rather than being invented.
- `financing_available` is enabled only for the Mazda CX-5, whose old description includes a KES 1.5M deposit and a 36-month balance. Confirm that offer and its terms before treating it as current.
- Negotiable status is enabled only where the source description explicitly says the price is negotiable.
- Publication timestamps are generated during seeding to make demo listings visible and sortable. They are not original listing dates.
- The supplied prices, mileage, model years, descriptions, and features are reproduced for demonstration; none should be treated as current stock or verified specifications.

## Information not loaded as business truth

The previous `src/config/site.ts` contains contact and business settings. The contact details are now displayed from `config/dealership.php` in the existing shared site header/footer and on the contact page; the header/footer are also visible on the homepage. The standalone inventory, sold inventory, vehicle detail, sell-a-car, and finance pages use the same phone, email, location, map, and WhatsApp values in their duplicated header/footer. This demo uses phone `+254 722 511 803`, email `sales@konastoneautos.co.ke`, Moi Avenue, Mombasa, and working hours `Mon-Sat: 8am - 6pm`. Confirm these with stakeholders before launch. The current rebuild does not yet have a database-backed business settings feature.

The old project provided a Google Maps link to Moi Avenue in Mombasa, so the map on the contact page now searches for that location. Confirm the exact showroom address and map pin with stakeholders.

That file also claims `500+` vehicles sold, `12+ Years` of experience, and lists service promises. These are unverified marketing claims and have not been added as facts.

The previous SQL seed labels its six customer reviews as sample approved reviews. They are intentionally excluded so demo content is not presented as genuine customer testimony. The previous project also has brand logo files, but the current public brand strip uses template assets; brand logo migration and display wiring are a separate UI task.

## Stakeholder review checklist

For each vehicle, confirm or replace:

1. Whether it is currently in stock, reserved, sold, or in transit.
2. Model year, trim, condition, mileage, asking price, and negotiability.
3. Engine capacity, fuel, drivetrain, transmission, body type, and colours.
4. Feature list, description, and whether the attached photos show that exact vehicle.
5. Whether financing is available and the current deposit, rate, and repayment terms.
6. Location, registration details, and any other claims shown to customers.

Also confirm the dealership's phone, WhatsApp number, email, address, opening hours, finance terms, and which real customer reviews (if any) may be published.

## Demo setup and update workflow

The source catalogue is encoded in `database/seeders/VehicleSeeder.php`; the matching makes are in `database/seeders/BrandSeeder.php`. Image folders live in `public/assets/img/inventory/`.

For a clean, disposable local demo database, run:

```bash
php artisan migrate:fresh --seed
```

This command deletes and recreates all tables and data in the configured database. Use it only against a local or disposable demo database. Do not run it against a stakeholder, staging, or production database containing data you need to preserve.

After the stakeholder review, update the corresponding vehicle records in the admin or replace the demo values in `VehicleSeeder.php` for a fresh demo reset. New photos can be added to the matching folder and will be registered the next time the seeder runs. Before production, replace demo assumptions with stakeholder-confirmed data and ensure the app's public listings reflect actual availability.

## Source

Previous project: `/home/difre/Documents/Clients/Bonface/Konastone-auto/Konastone-auto`.

- Catalogue and feature copy: `supabase_seed.sql`.
- Contact, finance, promises, and business claims: `src/config/site.ts`.
- Vehicle images: `public/images/inventory/`.
- Sample reviews: `supabase_seed.sql` (not imported).
