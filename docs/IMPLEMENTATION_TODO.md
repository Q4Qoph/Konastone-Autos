# Konastone Implementation TODO

This checklist tracks the remaining work after the Filament admin, inventory filters, vehicle fields, and R2 image workflow implementation.

## Completed

- [x] Install and configure the Cloudflare R2 filesystem disk.
- [x] Add vehicle image storage metadata to the database.
- [x] Upload new vehicle images to R2 from Filament.
- [x] Support initial image uploads during vehicle creation.
- [x] Support image previews, cover selection, ordering, and deletion in Filament.
- [x] Require at least four images and one cover before publishing.
- [x] Display R2 and legacy images on Bootstrap inventory cards and vehicle details.
- [x] Add dynamic inventory filters and sorting.
- [x] Add cylinders and doors to vehicle records, forms, filters, and details.
- [x] Fix Filament vehicle view and edit URLs to resolve by slug.
- [x] Add automated feature coverage for inventory, image workflow, and Filament access.

## Remaining work

### Image management safety

- [ ] Prevent deleting an image from a published vehicle if fewer than four images would remain.
- [ ] Add database row locking for cover-image changes and image reordering.
- [ ] Extract cover, delete, and reorder operations into dedicated actions.
- [ ] Add editable alt text for each vehicle image.
- [ ] Add a public vehicle link to the Filament vehicle view page.

### Image processing and delivery

- [ ] Generate real R2 `thumb`, `card`, and `detail` image variants.
- [ ] Store image width and height metadata during upload.
- [ ] Confirm the public gallery always starts with the selected cover image.
- [ ] Enforce the four-image gallery rule in public inventory queries.
- [ ] Add tests for invalid images, oversized files, invalid dimensions, and the 12-image limit.
- [ ] Perform a manual R2 upload and browser delivery smoke test.

### Existing media and operations

- [ ] Build a dry-run, retry-safe command for migrating existing local uploads to R2.
- [ ] Add reporting for missing local files and orphaned R2 objects.
- [ ] Document R2 backup, restore, token rotation, and production custom-domain setup.

### Responsive verification

- [ ] Test the Filament create, edit, gallery, and view pages at mobile and desktop widths.
- [ ] Test Bootstrap inventory list, grid, filters, and vehicle gallery at 390px, 430px, 768px, and desktop widths.
