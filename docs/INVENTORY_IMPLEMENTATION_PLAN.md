# Konastone Autos — Inventory Implementation Plan

**Status: Approved — Phase One complete; Phase Two UI wiring paused pending visual verification (19 September 2026).**

This document adapts the supplied plan to the repository, including the newly copied inventory and supporting pages. Updated 18 September 2026. The proposed first coding task remains the database foundation only; approval of this document has not yet been given. Complete each phase and its review checkpoint before advancing.

## 1. Repository Findings

- Installed Laravel: **13.32.0**; Composer requires PHP `^8.3` and Laravel `^13.17`.
- `/` currently returns `pages.home` from a route closure in `routes/web.php`.
- Homepage: `resources/views/pages/home.blade.php`, not `resources/views/home.blade.php`.
- `resources/views/layouts/app.blade.php` contains almost the entire copied homepage. Its content yields currently appear before the shared header.
- The public theme loads Bootstrap-based CSS and JavaScript from `public/assets`. Vite/Tailwind dependencies exist in the starter project but are not a reason to change the theme.
- Only the default user model, migrations, factory, seeder, and example tests exist. There is no inventory domain yet.
- Local MySQL 8 is now installed and the `konastone` database/user are configured. PHPUnit continues to use in-memory SQLite for fast tests; MySQL migration verification has been completed locally.
- PHPUnit 12 and Laravel Pint are available dependencies. Filament and Laravel Boost are not declared in Composer.
- Existing uncommitted logo/view work must be preserved.

### Existing page and route map

All page files below live in `resources/views/pages/`. Reuse them rather than creating a parallel `resources/views/vehicles/` implementation.

| Blade file | Existing URL / route name | Planned role |
| --- | --- | --- |
| `home.blade.php` | `/` / currently unnamed | Featured and latest available vehicles; name the route `home` |
| `inventory-listing.blade.php` | `/inventory` / `inventory.index` | Primary inventory list, filters, sorting, pagination |
| `inventory-grid.blade.php` | `/inventory-grid` / `inventory.grid` | Grid presentation of the same inventory query |
| `inventory-sold.blade.php` | `/inventory-sold` / `inventory.sold` | Published sold vehicles with clear sold labels |
| `single-inventory.blade.php` | `/inventory/{vehicle}` / `inventory.show` | One publicly visible vehicle resolved by slug |
| `finance-calculator.blade.php` | `/finance-calculator` / `finance.calculator` | Future repayment estimate tool; not a finance application |
| `sell-a-car.blade.php` | `/sell-a-car` / `sell.car` | Future seller enquiry workflow, separate from dealership inventory |

The six copied pages are complete HTML documents with their own headers, footers, and scripts; they do not yet extend `layouts.app`. List, grid, sold, and detail routes currently render the copied pages directly so their original UI remains unchanged. The database foundation and controller remain available for a later, separately verified integration.

Local asset references and selected links have been adapted, but remaining `.html` links and mirrored font URLs need auditing. Some forms still target `html.themehour.net/kars/demo/mail.php`; the seller form targets `https://html.themehour.net/submit-form`. Copied finance copy includes unverified lending claims. The shared layout also has obsolete wooden-door metadata defaults. These are integration tasks, not evidence of working Konastone features.

## 2. Scope and Working Rules

Use Laravel, Eloquent, Blade, MySQL, Laravel storage/validation, and the existing Bootstrap theme. Keep database queries out of Blade. Use controllers, eager-loaded relationships, named routes, slug binding, and reusable vehicle components.

Preserve homepage and copied-page appearance, responsive behavior, animation hooks, and asset loading. Do not introduce frontend frameworks, replace Bootstrap, or install Filament during the foundation work. Do not invent contact details, claims, or customer data. Preserve existing route names and URLs wherever possible so the newly wired navigation remains valid.

Before each major phase, report intended files, behavior changes, database impact, and validation. Afterward report actual changes, checks, remaining manual steps, and the next approval checkpoint. Commit by feature only when requested.

## 3. Phase One — Database Foundation

### Environment preparation

After approval, follow root `AGENTS.md`, including prerequisite checks and Laravel Boost setup; re-read generated guidelines before application edits. Report any dependency/network blocker. This documentation task does not install packages.

Verify PHP's MySQL driver, `mysql --version`, server availability, and Laravel connectivity. At the time of this plan update, the repository environment has the MySQL 8 client and `pdo_mysql`, but no reachable local server socket. On Ubuntu/Debian, install and start the server before proceeding:

```bash
sudo apt update
sudo apt install mysql-server mysql-client
sudo systemctl enable --now mysql
mysql --version
mysqladmin ping -u root
```

Create a dedicated development database user rather than using root for Laravel. Replace the password with a local-only value and do not commit it:

```bash
sudo mysql
```

```sql
CREATE DATABASE konastone CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'konastone'@'localhost' IDENTIFIED BY 'replace-with-a-local-password';
GRANT ALL PRIVILEGES ON konastone.* TO 'konastone'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Set these values in the untracked project `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=konastone
DB_USERNAME=konastone
DB_PASSWORD=replace-with-a-local-password
```

Then refresh Laravel's cached configuration and verify the connection:

```bash
php artisan config:clear
php artisan migrate:status
```

Use `php artisan migrate --seed` after the status check. Use `php artisan migrate:fresh --seed` only when `konastone` is confirmed to be a disposable local database; it drops every table. Never expose credentials or commit `.env`.

Inspect the target database before migrations. Use ordinary `php artisan migrate` for a database containing existing data. Run `php artisan migrate:fresh --seed` **only against a confirmed disposable development/test database**: it drops all tables. Never infer permission to reset existing data from plan approval.

### Models and schema

Create `Brand`, `Vehicle`, `VehicleImage`, and `VehicleFeature` in `app/Models`, with migrations and factories. Defer `Lead` to the enquiry phase.

| Table | Fields and constraints |
| --- | --- |
| `brands` | ID, name (indexed), slug (unique), nullable logo_path, is_active (default true), nullable sort_order, timestamps |
| `vehicles` | ID, brand_id (foreign key), model, nullable trim, unique slug, year, condition, nullable unique stock_number, nullable chassis_number, engine, engine_capacity, fuel_type, transmission, drivetrain, body_type, mileage, exterior_color, interior_color, price, nullable previous_price, currency (default KES), nullable description/location, status (default draft), is_featured/is_negotiable/financing_available (default false), nullable published_at/sold_at, timestamps |
| `vehicle_images` | ID, vehicle_id (foreign key), path, nullable alt_text, sort_order (default 0), is_cover (default false), timestamps |
| `vehicle_features` | ID, vehicle_id (foreign key), name, timestamps; unique vehicle_id/name pair |

Use `decimal(15,2)` for prices; unsigned integers for mileage (kilometres) and engine_capacity (cc); unsigned small integer for year. Store flexible engine descriptions separately in `engine`. Model monetary casts must preserve decimal precision rather than use floating-point calculations.

Use string columns for controlled values and a backed `VehicleStatus` enum: draft, available, reserved, sold, archived. Validate the supplied condition/fuel/transmission/drivetrain/body-type values when write interfaces are introduced. Add further enums only where they reduce duplication.

Index brand_id and the status/published_at listing query. Confirm other indexes against actual filter queries. Restrict brand deletion while vehicles reference it; cascade vehicle image/feature records on deliberate vehicle deletion. Prefer archiving vehicles. Database cascade deletion does not delete storage files; authenticated media management will handle that later.

### Relationships, scopes, and integrity

- Brand has many vehicles; vehicle belongs to a brand and has many images/features; children belong to their vehicle.
- Provide ordered images and a cover-image relationship to avoid loading full galleries for every card.
- Add available, featured, and published scopes. Published means published_at is non-null and not in the future; it does not alone grant public visibility.
- Proposed public policy: list/grid inventory, homepage selections, and similar vehicles show available, published vehicles belonging to active brands. The sold inventory page shows only published sold vehicles from active brands. Detail pages also allow published reserved/sold vehicles, with accurate badges; draft, archived, future/unpublished, and inactive-brand vehicles return 404 even with a known slug. Reserved vehicles remain accessible by detail URL but are excluded from available and sold collections. Approve this policy with the schema.
- Set sold_at when a vehicle becomes sold; clear it when reopening a listing. Sort the sold collection by sold_at descending with a stable ID tie-break and defined handling of older records without a sold date.
- Generate slugs from year, brand, model, trim, and an optional stock reference; use a suffix plus a database unique constraint with collision handling. Preserve existing slugs on ordinary edits.
- Keep chassis numbers private; never include them in public specifications or metadata.
- Enforce at most one cover image through a transaction locking the vehicle row when selecting a cover. Allow zero images and use a deterministic first-image/fallback policy. A composite unique index on vehicle_id/is_cover is unsuitable because it would also limit non-cover images.

### Seed data and verification

Create `BrandSeeder` and `VehicleSeeder` with approximately 10 brands and 20–30 clearly fictional development vehicles. Cover all statuses, publication dates, featured flags, nullable specifications, multiple images, and duplicate model names. Seed local sample images into public storage; use no customer data or invented production stock.

Foundation deliverables:

- Four migrations, four models, four factories, two seeders, and `app/Enums/VehicleStatus.php`.
- Update `database/seeders/DatabaseSeeder.php` without introducing demo users into production workflows.
- Focused tests for relationships, enum/decimal/date casts, scopes, slug uniqueness, cover selection, and foreign-key behavior.
- Verify migrations and seeding against disposable MySQL, not just SQLite; retain fast SQLite tests where compatible.
- Run relevant PHPUnit tests and Pint on changed PHP files.

**Checkpoint completed: four inventory tables migrated successfully on MySQL, 10 brands and 22 vehicles seeded, including all planned status states, images, and features. Foundation tests pass.**

## 4. Phase Two — Public Inventory

Phase Two now has a minimal first step: `VehicleController` supplies database records to the existing list, grid, and sold pages, and only their repeated card rows are replaced when the controller supplies a collection. The copied document structure remains the source of truth; the static rows remain available when the view is rendered without backend data.

### Frontend/backend compatibility audit

The current backend and copied frontend are compatible at the asset and route level, but the inventory pages are still presentation templates. The route names now exist for every copied page, and their internal links use the named routes where those pages have been copied. The remaining `.html` links point to future pages and are intentionally deferred.

| Area | Current state | Required adjustment |
| --- | --- | --- |
| Vehicle fields | The schema covers brand, model, trim, year, condition, mileage, fuel, transmission, drive, body, colors, price, status, images, and features used by the theme cards/detail page. | Map these fields in the existing card/detail markup; do not rename CSS classes or wrappers. |
| List/grid/sold pages | Routes retain the copied documents; their repeated card rows and paginator now use database records, with static rows as a no-data-variable fallback. | Complete query validation and visual review while retaining each page's document, header, filters, pagination, and footer markup. |
| Detail links | Current copied links use the sample `ford-explorer-xlt` parameter and the route accepts any value. | After card data is dynamic, bind `/inventory/{vehicle:slug}` and generate links from each record. Unknown or unpublished records must return 404. |
| Filters/sorting | Primary make/model/color/body controls now submit by GET to the corresponding list/grid route; the surrounding advanced controls remain decorative. | Add validation and finish allowlisted query fields one control at a time. Keep the control layout and classes unchanged. |
| Search/contact forms | Inventory and finance forms submit to `html.themehour.net`; seller form submits to the template endpoint. | Add owned Form Requests/controllers in the leads phase before enabling submissions. Never send Konastone visitor data to those endpoints. |
| Images | Templates use `public/assets`; seeded records reference existing theme images. | Add a single fallback and then map `VehicleImage` records in the existing image tags. Defer uploads until the admin/media phase. |
| Homepage | It is still hard-coded and does not query vehicles. | Later pass featured/latest records into the existing homepage card regions only. Preserve carousel structure and scripts. |

### Minimal-change integration sequence

1. Capture a working visual baseline for the six copied pages.
2. Add the controller and validated query object without changing any Blade markup.
3. Replace only the repeated list/grid/sold card data regions with a Blade loop using the same outer classes and card markup.
4. Connect paginator links and result counts while keeping the existing pagination containers.
5. Replace only detail text/image regions with bound vehicle values after the copied UI has been visually approved; leave gallery, breadcrumb, related-card, and script structure intact.
6. Add request validation and complete the supported filter controls while preserving their HTML classes.
7. Connect homepage cards after inventory pages pass visual and route checks.
8. Implement owned finance/seller/enquiry handlers separately; remove vendor form actions before production.

Each step must be tested with `php artisan view:cache`, route tests, and a visual comparison at the existing responsive breakpoints. If a change requires replacing a full document or introducing a new page layout, stop and review it before proceeding.

### Shared layout integration

First capture visual references for the homepage and six copied pages. Make a minimal Blade extraction: retain the shared document/head/header/footer/scripts in `layouts/app.blade.php`, move existing homepage body content into the appropriate sections of `pages/home.blade.php`, and place yields between shared header and footer. Preserve the rendered homepage structure. This is necessary so inventory pages do not inherit the entire homepage.

Convert the copied pages to extend that layout, retaining their breadcrumbs, content wrappers, page classes, and required script hooks. Compare existing header/footer variants before extraction; preserve necessary variants rather than forcing every page to use the homepage presentation. Keep scripts loaded once and provide page-specific stacks. Correct obsolete metadata defaults and use verified Konastone branding/contact configuration.

Audit desktop/mobile/footer links against actual named routes. Replace sample detail links when real records are available. Record unresolved links for deferred pages; remove or disable unavailable actions before launch rather than linking them to unrelated destinations. Remove external vendor submission behavior before making these pages public; retain form designs for their later implementation phases. Do not send visitor data to the template vendor.

### Dynamic list, grid, and sold views

Create `VehicleController` and replace the existing static inventory routes with controller actions while preserving `inventory.index`, `inventory.grid`, `inventory.sold`, and `inventory.show`. Keep the existing view filenames. Change detail binding to `/inventory/{vehicle:slug}` with visibility checks after binding; do not add a duplicate `/vehicles` URL family.

Use one reusable inventory query/filter implementation for list and grid. Both must return the same records for equivalent filters and sorting. Keep filters/sort when switching presentation, resetting the page number. Sold inventory reuses suitable display/filter code but always applies its own sold-only visibility constraint.

Introduce `resources/views/components/vehicles/card.blade.php` using existing theme markup, with explicit list/grid variants or small presentation partials where the original structures differ. Share vehicle values and links without forcing list markup into carousel or grid wrappers. Show cover image, vehicle identity, year, price/currency, mileage, transmission, fuel, condition, status, and details link. Use eager loading, 12 results per page, result counts, empty states, and Bootstrap pagination. Preserve validated query parameters during pagination.

Sold cards/details must display a prominent sold status and must not offer purchase or viewing of that vehicle. If its old price remains visible, label it as the last advertised price rather than a confirmed transaction price. A future enquiry may offer help finding a similar vehicle.

Support allowlisted sorting: newest, price ascending/descending, year descending, mileage ascending. Define deterministic tie-breaks and put unknown mileage last. Never accept arbitrary SQL columns from input.

**Checkpoint: verify homepage and all converted layouts visually, confirm list/grid parity, sold-only results, correct record links, empty states, and absence of vendor-bound form submissions before advancing.**

## 5. Phase Three — Filters

Use a GET form and a dedicated filter Form Request. Support brand slug, model text, year range, condition, body type, fuel type, transmission, and minimum/maximum price. Validate lengths, allowed values, non-negative numbers, and ordered ranges; combine filters consistently.

Keep selections and sorting in pagination links and list/grid toggles; include a clear-filters action. Basic filtering must work without JavaScript. Reuse the copied filter controls and connect only supported fields; remove or disable decorative controls until they have defined behavior. Use an existing Bootstrap mobile pattern only after checking the bundled version and behavior. For V1, seed/list prices in KES; do not compare different currencies as equivalent amounts. Query parameters must never override the available-only or sold-only route policy.

## 6. Phase Four — Vehicle Details

Adapt `pages/single-inventory.blade.php`; create gallery, specs, features, and status-badge components from its existing markup. Replace sample titles, photos, specifications, prices, and related cards with the bound vehicle. Show descriptions with escaped Blade output, meaningful image alt text, price, availability, finance flag, location, and non-empty specifications. Provide distinct slug-based title, description, canonical URL, and Open Graph metadata. Use a suitable raster image for social previews. Unknown or non-public slugs must return 404 instead of rendering the sample Ford page.

Similar vehicles must satisfy the same public listing rules, exclude the current vehicle, and limit results to four. Group same-brand/body-type/price-range conditions so OR clauses cannot bypass visibility restrictions.

Add `config/konastone.php` for verified company/contact details. A configurable WhatsApp number enables an encoded vehicle-specific message and named-route URL; hide the CTA when configuration is missing. Do not assume the current placeholder email or template phone is a verified business contact.

Book-viewing submission and WhatsApp tracking belong to the leads phase; do not present an inactive booking form as working functionality. A mobile CTA bar can be added when it has real destinations.

## 7. Phase Five — Homepage Data

Create `HomeController`, name `/` as `home`, and continue returning `pages.home`. Fetch bounded featured and latest collections using identical publication/visibility rules. Replace only the relevant hard-coded cards, reusing the vehicle card component while preserving homepage grids/carousels. Define empty states; never silently show demo stock as real inventory. Point browse-all actions to `inventory.index`, sold-stock actions to `inventory.sold`, and each vehicle card to `inventory.show` with its actual slug. Connect any retained homepage vehicle search to the same validated inventory GET filters.

## 8. Phase Six — Image Infrastructure Completion

Basic public-disk paths, seeded images, cover selection, and fallbacks are needed during the foundation/public-page phases; do not defer them until galleries are already built. Use `storage/app/public/vehicles/` and `php artisan storage:link`.

At this phase complete gallery ordering/fallback behavior and media lifecycle design. Staff uploads arrive with the authenticated admin: validate JPEG/PNG/WebP content, MIME type, dimensions, and file-size limits; generate filenames; authorize mutations; clean up replaced/deleted files safely. Do not add public upload routes. Defer cloud storage and format conversion.

## 9. Phase Seven — Administration

Only after the public flow is accepted, check Filament compatibility with the installed Laravel/PHP versions and install a compatible release. Add authenticated, authorized vehicle/brand management, image upload/reorder/cover selection, publishing/status changes, and featured selection. Group forms into identity, specifications, pricing, listing, and images. Test staff use on mobile.

## 10. Phase Eight — Leads

Add `Lead`, migration/factory, nullable vehicle association, name/phone, optional email/message, source/status, optional UTM fields, and timestamps. Preserve enquiries if their associated vehicle is deleted by nulling the association.

Implement validated, rate-limited, CSRF-protected enquiry and booking forms, then admin lead management. A WhatsApp click is not proof of a received enquiry; track it separately from confirmed leads. Set appropriate access and retention rules for personal data.

### Existing sell-a-car page

Activate `pages/sell-a-car.blade.php` in this phase only after agreeing the seller fields and staff review process. Preserve its existing GET route, add a named POST route/controller and Form Request, and map each visible field to explicit validation/storage. Use a separate seller-submission record linked to a lead where useful; a visitor submission must not create or publish a `Vehicle` automatically.

Provide success/error feedback, preserve safe input, and protect submissions against spam. Seller photos, if included, require bounded uploads and private storage until reviewed. Decide required fields, photo limits, retention, and staff notifications before implementing this form. Add tests for validation, successful submission, authorization, and upload handling.

### Existing finance-calculator page

Treat `pages/finance-calculator.blade.php` as a separate optional milestone after inventory acceptance. Inspect the bundled script behavior before choosing implementation. Define inputs for vehicle price, deposit, annual interest rate, and loan term; confirm the intended calculation method and rounding. Prefill price from a publicly visible vehicle when provided, without trusting client input as a lending offer.

For an approved amortizing-loan estimate, cover zero-interest calculations, invalid/negative values, deposit above price, and zero term. Show currency, monthly estimate, and total repayment with clear assumptions. Rates must be entered or supplied by verified business configuration; remove unsupported lender claims. A calculator requires no customer-data submission or vendor form action. Finance applications and lender integrations remain deferred.

## 11. Acceptance and Handoff

Test homepage/list/grid/sold/detail responses; all status/publication visibility cases on every public surface; invalid slugs; combined filters; invalid ranges/sorts; pagination state; list/grid result parity and switching; sold-only results; featured/latest limits; cover/fallback behavior; and similar-vehicle exclusions. Inspect query counts to catch N+1 behavior. Confirm generated detail links identify their own records, scripts load once, and forms do not target vendor endpoints.

Visually check 375, 390, 430, 768, 1024, and 1440px widths, including mobile navigation, filters, galleries, pagination, image ratios, and long vehicle titles. Blade compilation alone does not establish visual or functional correctness.

Expected checks include `php artisan test`, `vendor/bin/pint --dirty`, and `php artisan view:cache`. MySQL schema checks require a separate disposable target. Only run asset builds if source assets change.

Use focused commit subjects such as `feat: add vehicle inventory schema` and `test: cover public vehicle visibility`. Never commit secrets. Production must disable debug output.

## 12. Approval Items and Deferred Work

Approve this plan before code begins, including the existing `/inventory` route family, public reserved/sold detail visibility, sold archive and last-advertised-price policy, inactive-brand behavior, KES-only V1 filtering, stable slug policy, and the database target for verification. Supply verified contact details before contact CTAs are enabled. Seller-submission details and finance calculation assumptions can be approved at their later milestones without blocking the database foundation.

The copied pages are presentation starting points. Completion of a copy, route registration, or Blade compilation does not establish functional filtering, calculation, enquiries, seller uploads, or database integration. Disable vendor endpoints during layout integration, then enable owned handlers only when their feature phase passes verification.

Defer Facebook/Instagram integrations, Meta Catalog, WhatsApp Business Platform, finance applications, trade-ins, analytics dashboards, social publishing, and full CRM until the inventory and enquiry foundations are accepted. The existing seller template receives its first working submission flow in Phase Eight; a complete vehicle valuation/acquisition workflow remains future work.

### Delivery sequence

1. Approve this plan; implement and review the MySQL domain foundation.
2. Integrate the existing Blade layouts; connect list, grid, and sold inventory.
3. Connect and verify reusable filters and sorting.
4. Connect single-vehicle details, gallery, related vehicles, and configured contact links.
5. Connect homepage featured/latest vehicles and search.
6. Complete image handling and review the public inventory milestone.
7. Add compatible administration and authorized staff image management.
8. Implement enquiries and the seller submission workflow.
9. Implement the finance estimate tool when its calculation assumptions are approved.

The public inventory milestone is complete when real database records render correctly across the homepage, list, grid, sold archive, and detail pages; visibility and query tests pass; and the existing theme passes the specified responsive checks. Seller submissions and finance calculation are separate later deliverables.

**Next action after approval: implement Phase One only, validate it, and stop for schema review.**
