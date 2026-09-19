# Konastone implementation checklist

Status: Phases 0–3 implemented; Phases 4–8 remain.
Prepared: 19 September 2026.

This is the execution plan for [the backend and market review](BACKEND_MARKET_AND_INTEGRATION_REVIEW.md). It replaces the delivery sequence and conflicting completion notes in `INVENTORY_IMPLEMENTATION_PLAN.md`; retain that document as historical context.

## Objective and working boundaries

Deliver a database-backed dealership website using the existing Laravel, Blade and Bootstrap theme. Preserve its visual design while making inventory, search, staff operations and customer enquiries work.

- Preserve existing uncommitted work. Make each phase a separate reviewable change; commit only when requested.
- Keep existing public URLs and route names. Use explicit slug binding for vehicle details.
- Preserve page wrappers, classes, icons, IDs, image proportions, widget hooks and asset order. New empty/error/success states should use the theme's existing visual language.
- Make schema changes additive. Do not recreate existing inventory tables, reset a database or seed fictional vehicles into production.
- Keep public pages in Blade. Use an isolated staff layout under `/admin`.
- Complete each phase's acceptance checks before building on it. These are engineering verification gates, not requests for repeated user permission.
- Treat the first inventory release as a staging milestone. A public business launch also requires staff operations, owned contact flows and production readiness.

## Phase 0 — Capture the baseline

Dependency: none. Database changes: none.

- [ ] Record the current working-tree changes and route list; preserve the seven existing pages as the visual reference.
- [ ] Run the existing tests and record their results. The previous review found six passing tests, including placeholder behavior that must change later.
- [ ] Inspect the configured development database read-only; identify the separate disposable database used for verification.
- [ ] Capture `/`, `/inventory`, `/inventory-grid`, `/inventory-sold`, a detail page, `/sell-a-car` and `/finance-calculator` at 390, 768, 1024 and 1440 px widths.
- [ ] Record existing browser errors, failed assets and interaction defects separately from new regressions. Include mobile navigation, search expansion, selects and gallery behavior.
- [ ] Record representative card markup and asset loading order. Use fixed content and animation timing for repeatable comparisons.

Acceptance: baseline screenshots and a known-defect list exist. If no browser tooling is available, use manual browser capture; do not claim visual verification from PHP tests. Do not install a browser/test dependency implicitly.

## Phase 1 — Make the inventory backend ready

Dependency: Phase 0. Primary files: `app/Models/Vehicle.php`, `app/Models/VehicleImage.php`, `app/Http/Controllers/VehicleController.php`, proposed `app/Http/Requests/InventoryFilterRequest.php`, inventory tests. Database changes: none expected for the initial read path; inspect schema before adding anything.

- [ ] Centralize public visibility according to the table below.
- [ ] Prepare explicit `{vehicle:slug}` binding for controller routes. Keep existing slugs stable.
- [ ] Apply available-stock visibility to related vehicles and exclude the current vehicle.
- [ ] Validate search input and normalize values before querying. Reuse the same query behavior for list and grid.
- [ ] Define one image URL convention supporting current theme assets and future storage uploads. Select cover image, then first ordered image, then neutral placeholder.
- [ ] Remove invented defaults such as zero mileage and Automatic transmission for unknown specifications.
- [ ] Eager-load card relationships and detail gallery/features. Use deterministic sorting with an ID tie-breaker.
- [ ] Keep chassis numbers and private fields out of the public view contract.
- [ ] Add focused backend coverage before public routing is switched. Replace placeholder HTTP expectations in Phase 2 when their behavior changes.

| Vehicle state | Available list/home/related | Sold archive | Detail |
| --- | --- | --- | --- |
| Available, published, active brand | Yes | No | Yes |
| Reserved, published, active brand | No | No | Yes, reserved label |
| Sold, published, active brand | No | Yes | Yes, sold label |
| Draft, archived, future/unpublished, inactive brand | No | No | 404 |
| Unknown slug | Not applicable | Not applicable | 404 |

Initial query contract:

| Parameters | Rules |
| --- | --- |
| `brand`, `model`, `condition`, `body_type`, `exterior_color` | Bounded scalar values; canonical brand slug; controlled values where applicable |
| `transmission`, `fuel_type`, `drivetrain` | Allowed canonical values, matching form options |
| `min_price`, `max_price` | Nonnegative KES amounts, sensible upper bound, minimum no greater than maximum |
| `min_year`, `max_year`, `max_mileage` | Bounded integers, valid ranges |
| `sort` | `newest`, `price_low`, `price_high`, `year`, `mileage` |
| `page` | Positive integer; 12 records per page |

Optional controls beyond the existing UI can remain backend-ready until there is an appropriate existing location for them. For invalid GET filters, return the same themed page with validation feedback and no misleading results; do not redirect indefinitely to the same invalid URL. An out-of-range results page should show an empty state and a first-page/reset link. Preserve valid filters in both cases.

Acceptance: query tests cover combined filters, invalid scalar/array inputs, reversed ranges, null specifications, image fallback and visibility. No public page is switched prematurely.

## Phase 2 — Deliver working inventory list, search and details

Dependency: Phase 1. Files: `routes/web.php`, `resources/views/pages/inventory-listing.blade.php`, `single-inventory.blade.php`, `partials/vehicle-cards.blade.php`, `partials/vehicle-pagination.blade.php`, inventory feature tests. Database changes: none expected.

- [ ] Restore the original list card structure in the partial, including icon wrappers and theme controls. Bind title, trim, engine capacity, transmission, fuel, price, image and detail URL.
- [ ] Replace only the repeated static card area with the database collection. Preserve surrounding sections.
- [ ] Add accurate result counts, a theme-styled empty state and compact pagination.
- [ ] Give search its own form ID. Remove its `ajax-contact` behavior after checking CSS dependencies; preserve styling classes.
- [ ] Associate advanced controls with that form, using HTML `form` attributes where moving elements would change layout. Correct their names and values.
- [ ] Render filter options from canonical data, preserve selections after reload, connect sorting and provide a reset link. Verify themed select initialization.
- [ ] Bind the detail title, KSh price, specifications, description, ordered gallery, status and related vehicles inside the existing HTML.
- [ ] Preserve correct gallery/slider hooks and handle zero or one image without JavaScript errors.
- [ ] Switch list and detail routes to the controller in the same change. Update the test that currently expects an unknown slug to return 200.
- [ ] Ensure linked CTAs are truthful: configure verified contact details if available, otherwise show an unavailable contact action rather than a vendor destination.

Acceptance: a database vehicle appears in search results, opens its own detail page, and displays matching information. Search submits GET in the browser, pagination retains filters, unknown/private vehicles return 404, and no fictional fallback cards remain on integrated pages. Screenshots match baseline structure at all four widths, including long names and KSh prices.

**First deliverable:** Phases 0–2. Demonstrate search → matching vehicle → correct detail page, with backend tests and visual comparisons.

## Phase 3 — Connect grid, sold inventory and homepage

Dependency: Phase 2. Files: existing grid/sold/home views, `layouts/app.blade.php`, routes, vehicle controller and a proposed home controller. Database changes: none expected.

- [ ] Connect grid to the same query and filter contract as list; preserve filters when switching views.
- [ ] Adapt card variants to each page's original markup rather than forcing all pages into one layout.
- [ ] Connect sold inventory, status labels, result counts and pagination; order by sold date with deterministic handling of missing dates.
- [ ] Connect homepage featured/latest collections and existing brand/category/search links. Restrict collections to publicly available stock.
- [ ] Update only the relevant homepage sections currently located inside `layouts/app`; preserve hero and section order.
- [ ] Handle zero/few vehicles without duplicating stock to fill sliders or presenting demo cars.
- [ ] Confirm the sold-price policy before public release; recommended display is the last advertised price, clearly identified as such, never represented as the actual transaction price.

Acceptance: all public inventory surfaces use consistent stock and availability rules; grid/list navigation retains filters; sold vehicles never appear as available. Each page passes browser interaction and visual checks.

## Phase 4 — Consolidate layouts and remove template leftovers

Dependency: Phase 3. Files: existing layout/pages and scoped shared partials. Database changes: none.

- [ ] Move homepage content into the home view and place layout content between header and footer.
- [ ] Extract head/header/footer/scripts only where markup is genuinely shared; preserve page-specific variants.
- [ ] Convert standalone pages incrementally. Ensure exactly one document, header/footer and asset set per response.
- [ ] Resolve broken mirrored font URLs, `.html` navigation, incorrect metadata and sample business details.
- [ ] Disable remaining external vendor form submissions until owned handlers exist, retaining the form layout and explaining its unavailable state.
- [ ] Remove duplicate widget initialization and verify menus, sliders, selects and gallery behavior.

Acceptance: no duplicated homepage content, assets or handlers; no customer data sent to theme endpoints; no new visual regressions. Placeholder features are not presented as working business services.

## Phase 5 — Staff inventory management

Dependency: Phase 3; can follow Phase 4 in the default sequence. Files: proposed admin controllers/requests/policies/views, user authorization, inventory write operations and additive migrations where necessary.

- [ ] Implement staff login, password recovery and policies. Proposed roles: owner/manager can publish and manage staff; sales can manage assigned enquiries and permitted inventory fields.
- [ ] Create inventory list, create/edit, draft preview, publish, reserve, mark sold and archive workflows.
- [ ] Validate required publication fields and KES pricing. Generate collision-safe slugs for new vehicles and preserve them on ordinary edits.
- [ ] Enforce status transitions and sold timestamps in a shared write operation. Prevent concurrent conflicting transitions with a transaction/lock where required.
- [ ] Implement upload validation, image re-encoding, gallery order, cover selection and safe deletion. Lock the vehicle when changing covers; preserve at most one cover.
- [ ] Record who changed status, price and publication state. Keep private vehicle fields out of public output.
- [ ] Keep admin CSS/assets isolated from the public theme. Use existing framework capabilities before selecting additional packages.

Acceptance: authorized staff can create a draft, upload photos, publish it and see it on the public site; reserve/sell/archive changes immediately affect public visibility. Unauthorized actions fail. Verify schema/integrity behavior on disposable MySQL, including concurrent status/cover operations where relevant.

## Phase 6 — Enquiries and seller submissions

Dependency: Phase 5 and verified destination contact details. Database changes: proposed `leads`, `lead_activities`, `seller_submissions`, `seller_submission_images` tables; confirm exact columns during schema implementation.

- [ ] Store vehicle/general/finance enquiry type, optional vehicle, contact, message, source, status, assignee and follow-up time.
- [ ] Add owned POST endpoints with validation, CSRF protection, throttling and clear error/success states in the original forms.
- [ ] Persist leads before queuing notifications. Avoid duplicate records on retries; distinguish notification delivery from successful enquiry storage.
- [ ] Build staff inbox, assignment, activity history and overdue follow-up views.
- [ ] Generate vehicle-specific phone/WhatsApp links from verified configuration. Track clicks separately from submitted enquiries.
- [ ] Implement seller intake with private moderated photos. A seller submission must not create a published vehicle automatically.
- [ ] Add reviewed conversion from seller submission to draft inventory, preserving the source relationship.

Acceptance: a visitor submits an enquiry, it persists even if email fails, and staff can assign and follow it up. Invalid submissions preserve input. Seller uploads remain private until reviewed and publication is a separate authorized operation.

## Phase 7 — Finance estimates, appointments and inspection evidence

Dependency: Phase 6 plus the applicable business inputs below. Deliver these as separate features.

- [ ] Define calculator rate type, rate, term, deposit, fees and rounding; implement server-validated estimates in the existing calculator page. Label results illustrative.
- [ ] Test known repayment examples, zero interest, full deposit, invalid terms and boundary amounts. Do not imply loan approval.
- [ ] Add appointment requests with requested/confirmed/cancelled states and staff confirmation; display times in Africa/Nairobi.
- [ ] Add inspection date/provider/status and an approved public summary; protect original private documents. Display only evidence-backed claims.
- [ ] Add import sourcing requests only if Konastone confirms the service. Keep overseas candidates and import milestones separate from locally available stock.

Acceptance: estimates are reproducible from their disclosed inputs; appointments require confirmation; inspection content is traceable to actual records. Finance/inspection details can be deferred without blocking the catalogue and enquiry release.

## Phase 8 — Production readiness

Dependency: Phases 0–6; include Phase 7 checks only for services being launched.

- [ ] Replace demo inventory with verified stock and real photos; confirm all contact and business details.
- [ ] Verify HTTPS, production configuration, protected staff access, mail delivery, storage and queue operation.
- [ ] Exercise backup restoration against a separate target and document application rollback without dropping business data.
- [ ] Check public pages for broken links/assets, vendor submissions, exposed private data and misleading sample copy.
- [ ] Run affected feature tests and the complete suite before release; run the repository formatter on changed PHP files. Build assets only if their sources changed.
- [ ] Repeat responsive/browser checks for the complete customer journey and record any accepted content differences.
- [ ] Test an enquiry and staff follow-up in staging with controlled data. Monitor application errors and failed jobs after authorized deployment.

Acceptance: a staff member can publish real stock, a visitor can find and enquire about it, and staff can complete the follow-up without using demo endpoints or exposing private records.

## Verification rules for every phase

Test observable behavior using existing PHPUnit tools and factories. Do not treat HTML compilation or passing placeholder tests as evidence of browser correctness. Run focused tests during implementation; run broader checks when an integration milestone warrants them. Keep layout-only changes separate from backend behavior changes so visual regressions are easier to locate.

Visual checks: 390/768/1024/1440 px; fixed content, loaded fonts and controlled animations. Check spacing, typography, image crop, card geometry, navigation, dropdowns, gallery and form states. Add long titles/prices, null fields, no images, zero/one/many results and reserved/sold examples. Expected data changes are acceptable; unexplained layout/style changes fail the gate.

If a gate fails, correct or revert only the current phase's application changes. Preserve prior user work and database records. Do not hide failures by restoring fictional stock.

## Business inputs and timing

| Input | Needed by | Planning default |
| --- | --- | --- |
| Single dealership or multiple independent sellers | Before staff schema | Single dealership/importer |
| Verified phone, WhatsApp, email and branch | Before enabling contact actions | No invented destinations |
| Real inventory and image rights | Before public release | Clearly isolated development fixtures |
| Sold-price preference | Before sold archive release | Proposed last advertised price label |
| Staff permissions | Before staff workflows go live | Owner/manager and sales roles |
| Finance assumptions and partner claims | Before calculator/finance release | Enquiry only until defined |
| Inspection and import services actually offered | Before those features | No unsupported claims |

None of these inputs blocks Phases 0–2 with development fixtures and inactive unconfigured contact actions. No payment, escrow, multi-dealer marketplace or automated lending work is included in this implementation plan.
