# Konastone Filament Admin Implementation Plan

**Status:** Proposed — documentation only

**Prepared:** 20 September 2026

## 1. Objective

Replace the current custom staff screens with an isolated Filament administration panel backed by Livewire and Tailwind, while preserving the existing Bootstrap/theme-based public website.

The first admin release will cover:

- Staff login and authorization
- Vehicle inventory listing, filtering, creation and editing
- Vehicle status transitions
- Vehicle image upload, cover selection, deletion and ordering
- Vehicle audit history
- Customer enquiry inbox, filtering, assignment, follow-up and status updates

The public routes, public Blade views, Bootstrap/theme assets and existing inventory data remain in scope but should not be redesigned as part of this migration.

## 2. Target architecture

```text
Public website
  Existing Blade views
  Existing Bootstrap/theme CSS and JavaScript
  Existing public routes and inventory presentation

Staff administration
  Filament panel at /admin
  Livewire-powered Filament resources and actions
  Tailwind/Filament assets loaded only by the panel
  Existing User model and is_staff authorization
  Existing Vehicle, VehicleImage, Enquiry and AuditLog models
```

Filament and the public Bootstrap theme must use separate layouts and asset pipelines. Do not load the Filament/Tailwind panel stylesheet into the public layout, and do not make the public theme depend on Filament components.

## 3. Repository baseline

The project currently has:

- Laravel `13.32.0`, PHP requirement `^8.3`, and PHP 8.4 in the project context.
- Tailwind CSS 4 and `@tailwindcss/vite` in `package.json`, but only the default Laravel starter CSS entrypoint uses it.
- A public Bootstrap/theme asset set under `public/assets`.
- A Filament staff panel under `/admin`, protected by the existing `users.is_staff` boundary.
- Staff login routes and `users.is_staff` authorization.
- `Vehicle`, `Brand`, `VehicleImage`, `Enquiry` and `AuditLog` models.
- Existing PHPUnit coverage for login, staff authorization, vehicle management, image management, enquiry updates and audit logging.

The current custom admin is working code and is uncommitted in the working tree. Keep it intact until the Filament panel reaches feature parity and passes the migration gate.

## 4. Implementation principles

- Use the installed package versions, not assumed APIs. Confirm versions immediately after installation with `composer show filament/filament livewire/livewire` and inspect each relevant command with `php artisan ... --help`.
- Preserve the existing database schema and business behavior unless a concrete Filament integration requires an additive change.
- Keep authorization in the application boundary. Hiding a Filament navigation item is not a replacement for policies or panel access checks.
- Keep complex inventory writes in existing controllers/services or move them into focused application actions where needed. Do not duplicate slug, status, publication, image and audit rules inside several Filament resources.
- Keep one source of truth for vehicle status transitions, image cover invariants and audit logging.
- Prefer Filament tables, forms, filters, actions and notifications for ordinary admin CRUD. Add custom Livewire components only where Filament does not provide the required workflow.
- Design mobile behavior intentionally. A responsive table is not automatically a good mobile workflow; use hidden columns, compact labels, record actions and a detail/edit screen for dense data.
- Do not use Filament to redesign the public-facing Bootstrap pages.

## 5. Phase 0 — Capture a safe baseline

**Dependency:** None  
**Database changes:** None  
**Primary output:** A repeatable before/after comparison

- [ ] Record the current working-tree state and keep all unrelated user changes untouched.
- [ ] Run the existing test suite and record the result.
- [ ] Run `php artisan route:list --except-vendor` and record the current public and custom admin routes.
- [ ] Capture the current `/login`, `/admin/vehicles`, `/admin/vehicles/create`, vehicle edit and `/admin/enquiries` behavior at desktop and mobile widths.
- [ ] Record current authorization behavior for guests, non-staff users and staff users.
- [ ] Record the current vehicle image workflow, including storage paths and cover-image behavior.
- [ ] Confirm the disposable test database and local admin seed credentials. Never use production credentials in development commands.

**Acceptance gate:** The current custom admin can be restored or kept available while the new panel is developed. Existing tests pass before package installation.

## 6. Phase 1 — Install and isolate Filament, Livewire and Tailwind

**Dependency:** Phase 0  
**Database changes:** None expected  
**Primary files:** `composer.json`, `composer.lock`, `package.json`, `package-lock.json`, `app/Providers/Filament/AdminPanelProvider.php`, `bootstrap/providers.php`

### 6.1 Verify package compatibility

Before changing dependencies:

- [ ] Confirm the current Filament major version and Laravel 13 support from the official documentation.
- [ ] Confirm the exact Tailwind version resolved by `package-lock.json`.
- [ ] Check whether the selected Filament version installs the required Livewire major automatically.
- [ ] Review the available installation commands with `php artisan filament:install --help` after the package is present.
- [ ] Do not add unrelated UI, roles, media-library or dashboard plugins in the first migration.

Filament’s current panel documentation lists PHP 8.2+, Laravel 11.28+ and Tailwind CSS 4.1+ as requirements. The project is on Laravel 13 and PHP 8.4, but the resolved Tailwind patch version and selected Filament release must still be verified before installation.

### 6.2 Install the panel

Use the official Filament panel installation flow after version confirmation. The expected sequence is conceptually:

```bash
composer require filament/filament:"^5.0"
php artisan filament:install --panels --no-interaction
```

If the selected compatible major differs, use that verified constraint instead. Do not blindly copy the example version into `composer.json`.

After installation:

- [ ] Confirm `AdminPanelProvider` is registered in `bootstrap/providers.php`.
- [ ] Confirm the panel path is `/admin` and decide whether to retain or temporarily change it to avoid route collisions.
- [ ] Confirm Filament assets are loaded only in the Filament panel.
- [ ] Keep `resources/views/layouts/app.blade.php` and public `public/assets` references unchanged.
- [ ] Run the asset build and confirm both the public pages and panel load without missing Vite assets.
- [ ] Run `php artisan optimize:clear --no-interaction` if configuration or provider discovery is stale.

### 6.3 Tailwind boundary

The project already uses Tailwind 4 syntax in `resources/css/app.css`. The panel migration should:

- Keep the Tailwind CSS entrypoint available to Filament.
- Keep the public Bootstrap/theme CSS loaded by `resources/views/layouts/app.blade.php`.
- Avoid rewriting the large public theme into Tailwind.
- Avoid a global CSS reset that changes public pages.
- Use Filament theme customization only for branding, colors, logo and typography needed inside `/admin`.

**Acceptance gate:** A blank Filament panel renders at `/admin`, a public page renders exactly as before, and both asset pipelines can be built in the same application.

## 7. Phase 2 — Integrate staff authentication and authorization

**Dependency:** Phase 1  
**Primary files:** `app/Models/User.php`, `app/Providers/AppServiceProvider.php`, `app/Providers/Filament/AdminPanelProvider.php`, existing auth tests

- [ ] Make the existing `User` model implement the Filament panel-access contract required by the installed Filament version.
- [ ] Implement panel access using the existing `is_staff` field and the current `manage-inventory` authorization intent.
- [ ] Keep the existing `web` guard and users table unless the installed Filament version requires a documented change.
- [ ] Confirm guests are redirected to the panel login page.
- [ ] Confirm non-staff users receive a forbidden response and cannot access panel routes directly.
- [ ] Confirm staff users can log in, log out and access `/admin`.
- [ ] Preserve the existing login rate limiter and session regeneration behavior, or explicitly replace it with an equivalent protected flow.
- [ ] Do not use `make:filament-user` for production staff if the project’s existing seeded staff account is the source of truth. Use the existing `AdminUserSeeder` or an approved account-management workflow.
- [ ] Add policies for `Vehicle`, `VehicleImage`, `Enquiry` and any future resources. Use the existing staff gate as the first coarse boundary and policies for resource/action authorization.

**Acceptance gate:** The authorization matrix passes:

| Actor | Public website | `/admin` login | Admin data/actions |
| --- | --- | --- | --- |
| Guest | Allowed where public | Login only | Denied |
| Authenticated non-staff | Allowed | Denied/403 | Denied |
| Staff | Allowed | Allowed | Allowed according to policy |

## 8. Phase 3 — Build the Filament inventory resource

**Dependency:** Phase 2  
**Primary files:** `app/Filament/Resources/VehicleResource/**`, existing vehicle models/actions/policies/tests

Generate the resource using the installed Filament version’s documented command. Use the command help first and pass `--no-interaction`:

```bash
php artisan make:filament-resource Vehicle --no-interaction
```

Adapt the generated resource to the project’s existing model and rules.

### 8.1 Inventory list page

- [ ] Show cover image, year, brand, model, stock number, KSh price, status, updated time and key publication state.
- [ ] Add filters for status, brand, condition, body type, location and publication state where those fields exist.
- [ ] Add search for model, stock number and other bounded searchable fields.
- [ ] Add deterministic ordering and pagination.
- [ ] Eager-load `brand` and cover-image relationships to avoid N+1 queries.
- [ ] Use status badges with clear `Draft`, `Available`, `Reserved`, `Sold` and `Archived` labels.
- [ ] Keep private fields such as chassis/VIN data out of the list unless an explicit staff requirement is approved.
- [ ] Provide a clear empty state rather than demo/fallback vehicles.

### 8.2 Vehicle form

Organize the form into mobile-friendly sections or tabs:

1. **Identity:** brand, model, trim, year, condition and stock number.
2. **Pricing:** price, previous price, currency, negotiable and financing flags.
3. **Specifications:** engine, engine capacity, mileage, fuel, transmission, drivetrain, body type and colors.
4. **Availability:** status, location, featured flag and publication behavior.
5. **Description:** public description and any approved public notes.
6. **Media:** vehicle images, cover selection and ordering.
7. **Audit context:** read-only recent audit entries on edit.

- [ ] Reuse the existing `VehicleRequest` validation rules or extract shared validation so the custom and Filament paths cannot drift during migration.
- [ ] Preserve collision-safe slug generation and stable slugs on ordinary edits.
- [ ] Preserve publication and sold timestamp rules.
- [ ] Preserve KES currency behavior.
- [ ] Show validation errors beside the relevant fields.
- [ ] Use Filament notifications for successful saves, uploads and status actions.
- [ ] Keep destructive actions explicitly confirmed.

### 8.3 Vehicle actions

Implement and test actions for:

- Save draft
- Publish/make available
- Reserve
- Mark sold
- Archive
- Upload images
- Set cover image
- Reorder gallery
- Delete image

These actions must call shared application logic or preserve the same behavior as the current `Admin\\VehicleController`. Do not copy the status/date/audit rules into several anonymous action closures.

### 8.4 Audit history

- [ ] Keep the existing `audit_logs` table and `AuditLog` model.
- [ ] Record staff user, event, old values and new values for status, publication, price and other approved sensitive changes.
- [ ] Display recent history read-only in the vehicle edit experience.
- [ ] Prevent ordinary staff from editing or deleting audit records.

**Acceptance gate:** A staff user can create a draft, edit it, upload and order images, select a cover, publish it, mark it sold and review the audit history. The public inventory behavior remains unchanged.

## 9. Phase 4 — Build the Filament enquiry resource

**Dependency:** Phase 2; vehicle resource may be developed in parallel after shared panel authorization is stable  
**Primary files:** `app/Filament/Resources/EnquiryResource/**`, `app/Models/Enquiry.php`, enquiry policy/tests

- [ ] Show received time, customer name, phone, email, vehicle, source, status, assignee and follow-up time.
- [ ] Add filters for status, source, assignee, vehicle and overdue follow-ups.
- [ ] Add search for customer name, email, phone and subject.
- [ ] Keep the message and internal notes available on the record detail/edit view rather than forcing all content into a wide table.
- [ ] Add a row action or edit page for status, assignment, follow-up date and internal notes.
- [ ] Restrict assignee options to staff users, not every user record.
- [ ] Add clear statuses: `new`, `contacted`, `appointment`, `won`, `lost`.
- [ ] Add notifications after a successful update.
- [ ] Keep customer personal data out of URLs and avoid exposing internal notes in public views.
- [ ] Confirm whether staff can edit all enquiries or only assigned enquiries before finalizing policies.

For mobile, configure the table to prioritize customer, vehicle, status and received time. Hide secondary columns at smaller widths and use the record page for the full message and follow-up form.

**Acceptance gate:** Staff can find a new enquiry, open its full details, assign it, schedule a follow-up, add internal notes and move it through the agreed status flow on both desktop and mobile.

## 10. Phase 5 — Admin responsive UX and branding

**Dependency:** Initial vehicle and enquiry resources render correctly  
**Primary files:** Filament panel provider/theme files and generated resource views only

### Desktop behavior

- [ ] Use a sidebar navigation with clearly separated Inventory and Enquiries sections.
- [ ] Show searchable/filterable tables with enough context for routine desktop work.
- [ ] Keep important actions visible and group destructive actions separately.
- [ ] Use the Konastone logo and approved colors without copying public theme CSS globally.

### Mobile behavior

- [ ] Test at minimum 390px, 430px and 768px widths.
- [ ] Confirm the sidebar collapses into the panel’s mobile navigation.
- [ ] Confirm forms are one column at narrow widths and grouped fields remain understandable.
- [ ] Hide or collapse low-priority table columns on narrow screens.
- [ ] Make image upload, cover selection and gallery ordering usable by touch.
- [ ] Ensure status actions and save buttons remain reachable without horizontal scrolling.
- [ ] Ensure long model names, prices, validation errors and customer messages wrap correctly.
- [ ] Avoid requiring drag-and-drop as the only way to reorder images; provide an accessible alternative if Filament’s standard component does not provide one.

### Visual boundary

The admin does not need to look identical to the public Bootstrap theme. It should feel branded and consistent, but the admin’s information density and mobile task flow are more important than reproducing marketing-page markup.

**Acceptance gate:** Core staff tasks are usable with a phone-sized viewport and keyboard navigation. No admin table requires accidental page-wide horizontal scrolling for ordinary actions.

## 11. Phase 6 — Testing and verification

**Dependency:** Every implementation phase  
**Primary files:** Existing feature tests plus new focused panel tests

Read the testing guidance before adding or restructuring tests. Keep business behavior tests at the HTTP/model boundary and add Livewire/Filament interaction tests only for behavior that the existing feature tests cannot prove.

### Preserve and adapt current coverage

- [ ] Keep guest and non-staff denial coverage.
- [ ] Keep staff login/logout and non-staff login rejection coverage.
- [ ] Keep vehicle create/update/status transition coverage.
- [ ] Keep image upload validation, cover selection, deletion and ordering coverage.
- [ ] Keep enquiry filtering/update/assignment/follow-up coverage.
- [ ] Keep audit-log coverage.
- [ ] Update route assertions only after the old custom admin routes are intentionally retired.

### Add panel-specific coverage

- [ ] Panel guest redirect/login behavior.
- [ ] Panel access denial for non-staff users.
- [ ] Vehicle table search/filter behavior.
- [ ] Vehicle form validation and save behavior.
- [ ] Status action authorization and timestamp/audit behavior.
- [ ] Image upload and cover action behavior.
- [ ] Enquiry table filters and update actions.
- [ ] Notifications or visible success/error state where it is business-critical.

### Verification commands

Run the narrowest relevant checks after each slice, then the full checks at the migration gate:

```bash
php artisan test --compact tests/Feature/AdminVehicleManagementTest.php
php artisan test --compact
vendor/bin/pint --dirty --format agent
php artisan view:cache --no-interaction
npm run build
git diff --check
```

Use the exact test paths and commands supported by the installed Filament/Livewire versions. Do not claim mobile responsiveness from PHPUnit alone; perform browser checks at the agreed viewport widths.

## 12. Phase 7 — Cutover and remove the custom admin

**Dependency:** All acceptance gates pass and a reviewer confirms mobile behavior  
**Risk:** Medium; this changes staff URLs and authentication entry points

- [x] Use Filament's `/admin/login` as the staff login entry point.
- [x] Keep `/admin` as the stable staff URL.
- [x] Removed the old custom admin routes after Filament parity was verified.
- [ ] Update navigation links and seed documentation to point staff to the Filament panel.
- [x] Removed the obsolete custom admin controllers, views, forms and inline gallery JavaScript after cutover.
- [ ] Do not delete database tables or historical audit data.
- [ ] Update `docs/PROGRESS.md` only after the implementation is actually complete; documentation must not claim a migration based on this plan.

### Cutover acceptance checklist

- [ ] Guest cannot access panel data.
- [ ] Non-staff user cannot access panel data.
- [ ] Staff can complete the daily inventory workflow.
- [ ] Staff can complete the enquiry follow-up workflow.
- [ ] Public inventory URLs and visual behavior remain unchanged.
- [ ] Existing records and uploaded images remain intact.
- [ ] Audit history remains available.
- [ ] Full test suite, Pint, view cache, asset build and browser smoke checks pass.

## 13. Rollback plan

If the Filament panel fails a gate:

1. Keep the custom admin routes and views available.
2. Disable or hide the new panel entry point without deleting data.
3. Revert only the panel/resource/provider changes for the failed phase.
4. Keep additive package-lock/composer changes isolated in their own reviewable change if possible.
5. Do not reset the database, delete uploaded images or remove audit logs as part of rollback.
6. Diagnose the failed test, authorization boundary, asset conflict or mobile workflow before resuming.

The public website is not part of the Filament cutover and should remain independently deployable.

## 14. Deferred decisions and non-goals

The following are intentionally outside the first migration:

- Public website conversion from Bootstrap to Tailwind
- Rebuilding the public pages in Livewire
- A public-facing Filament panel
- Multi-tenant or multi-dealer permissions
- External CRM integration
- Automated email/SMS/WhatsApp workflows
- Payments, reservations or finance applications
- A third-party roles/permissions plugin
- A third-party media library plugin
- A dashboard analytics package

Revisit roles and permissions when the business needs more than the current staff/non-staff distinction. Revisit custom Livewire components only after a concrete workflow cannot be implemented cleanly with Filament resources and actions.

## 15. Recommended delivery order

1. Capture baseline and verify package compatibility.
2. Install Filament and verify isolated panel assets.
3. Integrate staff authorization.
4. Build and test the Vehicle resource.
5. Build and test the Enquiry resource.
6. Apply branding and mobile refinements.
7. Run full verification and browser checks.
8. Cut over staff navigation and remove the old admin only after parity is confirmed.

The first implementation milestone should be a working, mobile-tested Filament Vehicle resource without changing public pages. Enquiries and final cutover should follow as separate reviewable milestones.

## Official references

- [Filament 5 installation](https://filamentphp.com/docs/5.x/introduction/installation)
- [Livewire installation](https://livewire.laravel.com/docs/4.x/installation)
- [Laravel documentation](https://laravel.com/docs)
