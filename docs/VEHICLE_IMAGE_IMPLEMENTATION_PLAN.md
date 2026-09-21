# Vehicle Image Storage and Management Implementation Plan

## 1. Objective

Implement a complete vehicle-image workflow using the existing Cloudflare R2 account and the current Laravel, Filament and Bootstrap application:

- Store vehicle image files in Cloudflare R2.
- Store image metadata and vehicle relationships in MySQL.
- Require at least four images before a vehicle can be published.
- Upload and manage images from the Filament inventory workflow.
- Show the cover image in Bootstrap inventory cards and listings.
- Show the complete ordered gallery on the Bootstrap vehicle-detail page.
- Show image previews, cover state and ordering in Filament vehicle details and edit screens.
- Preserve existing theme images and avoid breaking current vehicles during migration.

## 2. Current project state

The project already has:

- A `vehicle_images` table with `vehicle_id`, `path`, `sort_order`, `is_cover` and `alt_text`.
- `Vehicle::images()` and `Vehicle::coverImage()` relationships.
- A Filament vehicle resource at `/admin/inventory`.
- A Filament gallery relation manager on the vehicle edit screen.
- Bootstrap inventory cards in:
  - `resources/views/partials/vehicle-cards.blade.php`
  - `resources/views/partials/related-vehicle-cards.blade.php`
  - `resources/views/partials/sold-vehicle-cards.blade.php`
- A Bootstrap vehicle-detail gallery in `resources/views/pages/single-inventory.blade.php`.
- Existing legacy theme paths such as `img/featured/featured-1-1.jpg`.

The current Filament gallery writes uploaded files to the local `public` disk. The implementation must replace that disk for new uploads without treating existing theme paths as R2 objects.

The supplied Cloudflare screenshot shows an existing R2 bucket named `konya360-upload` with existing objects. Before using it, verify that the bucket is intended for this application. Use a dedicated `vehicles/` prefix at minimum, and do not delete or reorganize the existing objects.

## 3. Storage decision

Use this split:

```text
MySQL          vehicle image metadata, ordering, cover state and variants
Cloudflare R2  original and generated vehicle image files
Laravel        validation, authorization, persistence and cleanup
Filament       staff upload and management interface
Bootstrap      public image display
```

Do not store image binaries in MySQL. The database should remain small and queryable, while R2 handles object storage and delivery.

Use Cloudinary only if the project later requires managed image transformations, automatic format negotiation, or a media-library workflow that is more valuable than R2 portability. R2 is sufficient for the current vehicle catalogue.

## 4. Cloudflare R2 setup

### 4.1 Verify the bucket

Before changing application code:

1. Open the existing R2 bucket `konya360-upload`.
2. Confirm its purpose and whether other applications use it.
3. Confirm that the application may write under the `vehicles/` prefix.
4. Do not delete, rename or overwrite the existing 17 objects shown in the screenshot.
5. If the bucket is shared or its ownership is unclear, create a dedicated bucket such as `konastone-vehicles` instead.

### 4.2 Create a restricted R2 API token

Create an R2 API token with the minimum required permissions:

- Object read and write access for the selected bucket.
- No account-wide administrative access.
- Separate credentials for local, staging and production where possible.

Never commit the access key, secret key, account ID or full endpoint into source control. The screenshot contains account information; do not copy it into the repository or documentation.

### 4.3 Configure public delivery

Preferred production setup:

- Keep the bucket write credentials private.
- Attach a custom public media domain to the bucket, for example `media.example.com`.
- Serve only approved vehicle images through that domain.
- Do not use the R2 S3 API endpoint as the permanent browser-facing URL.

If a custom domain is not available during local development, use the Laravel local disk or a temporary development URL. Do not make an unreviewed shared bucket public merely to make local images work.

If vehicle images must remain private in a future workflow, use signed URLs or a private bucket/prefix. R2 presigned URLs are suitable for time-limited object access, but they are not a replacement for authorization in the application.

### 4.4 Add environment configuration

Add local-only values to `.env` and document variable names in `.env.example` without real values:

```dotenv
FILESYSTEM_DISK=r2

R2_ACCESS_KEY_ID=
R2_SECRET_ACCESS_KEY=
R2_BUCKET=konya360-upload
R2_ENDPOINT=https://ACCOUNT_ID.r2.cloudflarestorage.com
R2_URL=https://media.example.com
R2_REGION=auto
```

Use the existing Laravel S3-compatible filesystem configuration to define an `r2` disk. The endpoint must use the Cloudflare account endpoint, the region must be `auto`, and the bucket must come from environment configuration.

## 5. Database and model changes

### 5.1 Extend `vehicle_images`

Create an additive migration. Keep all current columns and add:

```text
disk             string, default r2
original_name    nullable string
mime_type        nullable string
file_size        nullable unsigned integer
width            nullable unsigned integer
height           nullable unsigned integer
checksum         nullable string
variants         nullable JSON
uploaded_by      nullable foreign key to users
```

Recommended `variants` structure:

```json
{
  "thumb": "vehicles/{vehicle-id}/thumb/{uuid}.webp",
  "card": "vehicles/{vehicle-id}/card/{uuid}.webp",
  "detail": "vehicles/{vehicle-id}/detail/{uuid}.webp",
  "original": "vehicles/{vehicle-id}/original/{uuid}.jpg"
}
```

Use UUIDs or ULIDs for object names. Do not use the original filename as the object key.

### 5.2 Preserve legacy paths

Existing theme paths beginning with `img/` are not R2 objects. Keep them working through a central URL resolver:

```text
img/...                    -> asset('assets/img/...')
disk=public, stored path   -> Storage::disk('public')->url(path)
disk=r2, stored path       -> Storage::disk('r2')->url(path)
```

Do not keep this path logic duplicated in multiple Blade templates. Add a model accessor or dedicated image URL service with methods such as:

```text
url()
url('thumb')
url('card')
url('detail')
```

### 5.3 Strengthen relationships and invariants

Update `VehicleImage` to cast `variants` as an array and expose the configured disk. Keep the following rules in shared application code:

- A vehicle image belongs to exactly one vehicle.
- `sort_order` is unique within the vehicle's logical gallery order.
- A vehicle has no more than one cover image.
- Deleting the cover promotes the first remaining image.
- Theme assets are never deleted from R2 or local storage.
- An object is deleted only after its database record is safely removed.

Use a transaction and row lock when changing cover state or gallery order.

## 6. Upload validation and processing

### 6.1 Validation rules

Every upload path, including Filament actions, must validate:

- JPEG, PNG or WebP content.
- Maximum 5 MB per file.
- Maximum dimensions of 4000 × 4000 pixels.
- Maximum 12 images per vehicle.
- Valid image contents, not only the filename extension or browser MIME type.
- A vehicle ID belonging to the current authorized staff workflow.

### 6.2 Image count policy

Use a workflow-friendly rule:

- Draft vehicles may temporarily have fewer than four images.
- A vehicle cannot transition to `available` until it has at least four images.
- A vehicle cannot be publicly visible unless it has a cover image and at least four valid images.
- Reserved and sold vehicles retain their gallery and can still display it publicly according to the existing visibility rules.

If the business requires four images even for drafts, change the create/save validation after confirming that staff will not need to create a vehicle before uploading media.

### 6.3 Generate delivery variants

The first implementation should create these variants:

- `thumb`: approximately 320 px wide for Filament previews and compact UI.
- `card`: approximately 640 px wide for Bootstrap cards and homepage sections.
- `detail`: approximately 1600 px wide for the vehicle-detail gallery.
- `original`: retained for future reprocessing and administrative download.

Use a reviewed PHP image-processing package to resize, re-encode, strip unnecessary metadata and generate WebP where supported. Installing a new image-processing dependency requires a separate dependency review before implementation.

If variant generation is deferred initially, store the original in R2 and make the URL resolver ready for variants so the public templates do not need to change again later.

## 7. Shared image application service

Create one application boundary for image operations instead of putting storage rules inside Filament closures or Blade views.

Suggested responsibilities:

### `StoreVehicleImagesAction`

- Accept validated uploaded files and the vehicle.
- Generate safe object keys.
- Upload original and variants to the configured disk.
- Calculate checksum, dimensions, MIME type and file size.
- Create `VehicleImage` metadata rows.
- Assign the first image as cover if no cover exists.
- Record the staff user.
- Remove partially uploaded objects if database persistence fails.

### `SetVehicleCoverImageAction`

- Lock the vehicle's image rows.
- Clear the previous cover.
- Set the requested image as cover.
- Reject images belonging to another vehicle.

### `DeleteVehicleImageAction`

- Authorize the operation.
- Reject deletion if it would leave a published vehicle below the minimum image count, unless the vehicle is first made draft.
- Delete the database record.
- Delete all R2 variants after the record operation succeeds.
- Promote a replacement cover when necessary.
- Never delete legacy theme assets.

### `ReorderVehicleImagesAction`

- Accept only image IDs belonging to the vehicle.
- Validate that the submitted set does not contain duplicates or foreign records.
- Update `sort_order` in a transaction.

## 8. Filament inventory implementation

### 8.1 Vehicle list page

Update the Filament vehicle table to:

- Display the R2/card cover image.
- Fall back to the legacy theme image if no uploaded image exists.
- Keep image URLs generated through the shared resolver.
- Hide low-priority columns on small screens.
- Keep model, brand, price and status visible on mobile.
- Add an image-count indicator such as `4/12`.
- Add a warning badge when a draft has fewer than four images.
- Keep the existing status, brand, condition, body type and location filters.

### 8.2 Create vehicle flow

The create workflow should be:

1. Staff creates the vehicle as a draft.
2. The save action redirects to the vehicle edit page.
3. The edit page opens the Gallery section immediately.
4. Staff uploads at least four images.
5. Staff selects a cover and verifies the order.
6. Staff changes status to Available only after the image-count validation passes.

This avoids uploading files before a vehicle record exists and gives every object a stable vehicle-specific prefix.

### 8.3 Vehicle edit page

The edit page must include:

- Current image previews.
- Upload button with multi-file support.
- Upload progress and validation errors.
- Image count and remaining capacity.
- Cover indicator.
- Make-cover action.
- Delete action with confirmation.
- Touch-friendly reordering.
- Alt-text editing or automatic generated alt text.
- Stored dimensions and file size in a read-only image detail view.
- A warning when fewer than four images exist.

The gallery must remain usable at 390px, 430px and 768px widths. Drag-and-drop should not be the only ordering mechanism; provide keyboard or action-based ordering if the Filament table does not provide an accessible alternative.

### 8.4 Vehicle view page

The Filament vehicle view page should show:

- Cover image.
- Ordered image gallery.
- Image count.
- Stored image metadata where useful.
- Vehicle fields and publication status.
- Audit history.
- A link to the public vehicle detail page for published records.

The public link must use the vehicle slug route, not a database ID.

## 9. Bootstrap frontend implementation

### 9.1 Central URL contract

Before changing templates, implement the shared resolver and replace direct expressions such as:

```php
asset('storage/'.$image)
```

with the image model/service URL contract.

The resolver must support both old theme paths and new R2 paths during migration.

### 9.2 Inventory cards and listings

Update these partials:

- `partials/vehicle-cards.blade.php`
- `partials/related-vehicle-cards.blade.php`
- `partials/sold-vehicle-cards.blade.php`

For each card:

- Use the `card` variant when available.
- Use the cover image first.
- Fall back to the first ordered image.
- Fall back to the existing theme placeholder.
- Use an accurate `alt` value from `alt_text`, then vehicle title.
- Add `loading="lazy"` to non-primary images.
- Add `width` and `height` or a stable aspect-ratio wrapper to reduce layout shift.
- Keep the existing Bootstrap/theme classes and card structure.

Apply the same behavior to:

- Homepage featured vehicles.
- Inventory list.
- Inventory grid.
- Sold inventory.
- Related inventory.

### 9.3 Vehicle-detail gallery

Update `resources/views/pages/single-inventory.blade.php` to:

- Use the ordered `vehicle->images` relationship.
- Use the `detail` variant for the active gallery image.
- Use thumbnails for gallery navigation where supported by the existing theme JavaScript.
- Keep the existing slider and lightbox hooks intact.
- Ensure the cover image is first.
- Show all available images, not only the first three.
- Handle exactly 0, 1, 2, 3 and 4+ images without broken slider controls.
- Use meaningful alt text for every image.
- Keep the gallery responsive on mobile.
- Avoid rendering internal R2 object keys to users.

The page must continue to display legacy theme images while old records are being migrated.

### 9.4 Public visibility and cache behavior

Only display images for vehicles that pass the existing public visibility rules. Do not expose draft inventory or private seller images.

Use immutable object names so browser and CDN caching is safe. When an image is replaced, create a new object key rather than overwriting an existing public object.

## 10. Migration and backfill

### Phase A: schema and resolver

- Add image metadata columns.
- Add the R2 disk configuration.
- Add the shared URL resolver.
- Keep current theme paths working.
- Add tests before moving existing files.

### Phase B: new upload path

- Change Filament uploads from the local public disk to R2.
- Write new `disk`, `path`, metadata and variant values.
- Confirm uploaded images display in Filament and Bootstrap pages.
- Keep the local disk available until the migration is verified.

### Phase C: existing stored uploads

Inspect existing `vehicle_images` rows and classify them:

1. Theme asset paths beginning with `img/`: keep as theme assets.
2. Local uploaded paths: copy to R2 under the vehicle prefix, verify the copy, update metadata, then remove the local file only after verification.
3. Missing files: mark for staff review; do not silently create fake vehicle images.

Implement this as an idempotent Artisan command with:

- Dry-run mode.
- Explicit vehicle or batch selection.
- Checksum verification.
- Retry-safe behavior.
- A report of copied, skipped, failed and missing files.
- No deletion unless an explicit cleanup flag is provided.

### Phase D: enforce publishing rules

- Add the four-image requirement to the shared vehicle status action.
- Add a Filament validation message explaining which images are missing.
- Add tests for draft, available, reserved, sold and deletion scenarios.

## 11. Security and reliability requirements

- Keep R2 credentials server-side only.
- Use least-privilege bucket-scoped API tokens.
- Validate actual image contents and dimensions.
- Generate UUID/ULID object keys.
- Do not trust original filenames or client MIME types.
- Authorize every upload, reorder, cover and delete action through Filament policies and shared actions.
- Prevent cross-vehicle image IDs from being manipulated.
- Do not expose internal notes, draft images or private seller images.
- Keep database and object deletion behavior recoverable and observable.
- Log failed uploads and orphan-cleanup failures.
- Add a scheduled cleanup report for objects with no matching database row.
- Add backup/restore documentation for both MySQL metadata and R2 objects.

## 12. Testing plan

### Automated tests

Add or update PHPUnit feature tests for:

- R2 disk configuration and object path generation.
- Uploading four valid images.
- Rejecting invalid MIME types, oversized files and excessive dimensions.
- Rejecting a fifth-through-thirteenth image when the configured limit is reached.
- Preventing publication with fewer than four images.
- Assigning exactly one cover image.
- Reordering only images belonging to the current vehicle.
- Deleting a non-cover image.
- Deleting the cover and promoting a replacement.
- Preventing deletion from dropping a published vehicle below four images.
- Public cards using R2 URLs.
- Public detail pages rendering all ordered images.
- Legacy theme paths still rendering correctly.
- Filament vehicle list, view and edit pages rendering image controls.
- Non-staff users being denied all image-management actions.

Use `Storage::fake('r2')` for application tests. Do not use real Cloudflare credentials in PHPUnit.

### Manual browser checks

For one test vehicle with four images:

1. Create a draft in Filament.
2. Upload four images from a desktop browser.
3. Confirm all four objects appear under `vehicles/{vehicle-id}/` in R2.
4. Confirm the first image becomes cover.
5. Reorder images and refresh.
6. Change the cover and refresh.
7. Delete a gallery image.
8. Attempt to delete the last image from a published vehicle.
9. Publish the vehicle.
10. Confirm the cover appears on inventory list and grid pages.
11. Open the vehicle detail page and confirm all four images appear in the gallery/lightbox.
12. Repeat at 390px, 430px, 768px and desktop widths.
13. Inspect browser network requests for broken image URLs, mixed content and unexpected application-server image proxying.

## 13. Delivery order

1. Verify the existing R2 bucket and create scoped credentials.
2. Add `.env.example` variables and the `r2` filesystem disk.
3. Extend `vehicle_images` metadata.
4. Implement the shared image URL resolver.
5. Implement shared upload, cover, reorder and delete actions.
6. Switch Filament upload storage from local disk to R2.
7. Add the four-image publication gate.
8. Update Filament list, view and edit screens.
9. Update Bootstrap cards, listings and vehicle-detail gallery.
10. Add the migration/backfill command for existing local uploads.
11. Run automated tests, Pint, view cache and asset build.
12. Perform the manual desktop/mobile image workflow checks.
13. Only after verification, remove unused local-upload code and document the production R2 bucket/domain.

## 14. Definition of done

- New vehicle images are stored in R2, not MySQL.
- MySQL contains complete, queryable image metadata.
- Every published vehicle has at least four valid images and exactly one cover.
- Filament staff can upload, view, reorder, set cover and delete images from the vehicle workflow.
- Filament list, view and edit screens show correct image state.
- Bootstrap cards show the correct cover image.
- Bootstrap vehicle detail pages show every ordered image with working fallback behavior.
- Existing theme images still render.
- No public URL exposes R2 credentials or internal object-management details.
- Automated tests pass and manual responsive checks pass.
