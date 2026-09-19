# Konastone: backend market review and UI integration plan

Reviewed 19 September 2026. This is an investigation and proposed implementation plan; it does not implement the application changes below. It assumes Konastone is a single dealership/importer, with staff managing stock, rather than a marketplace with independent dealer accounts.

## 1. Findings from the project

The existing Laravel/Blade/Bootstrap stack is suitable. Keep the inventory foundation and the theme. The immediate problem is incomplete wiring and mismatched presentation contracts.

| Finding | Evidence | Consequence |
| --- | --- | --- |
| Inventory controller is disconnected | `routes/web.php` uses `Route::view` for all inventory pages | Database filters, pagination, visibility checks and detail lookup never run |
| Detail URLs are placeholders | `/inventory/{vehicle}` renders a static view; the test explicitly expects an unknown vehicle to return 200 | A successful page response does not establish that the requested vehicle exists |
| Slug binding is unfinished | Links in the card partial pass slugs, but `Vehicle` has no route-key override | When wiring the controller, explicitly bind `{vehicle:slug}` or implement the model route key |
| Shared layout contains homepage content | `layouts/app.blade.php` has almost 2,900 lines; its yields precede the header; `pages/home.blade.php` has an empty content section | Extending it from the standalone inventory documents risks duplicated homepage content, misplaced content and assets |
| Search JavaScript conflicts with the form | List search is GET but has `ajax-contact`; `public/assets/js/main.js` intercepts that class and sends POST | Search can fail before reaching the intended GET handler |
| Advanced filters do not have a complete submission contract | Controls follow the closing form tag; several use `select_make` with unrelated sample values | Drive, transmission and other values cannot reliably reach the query |
| Existing dynamic cards change markup | `partials/vehicle-cards.blade.php` omits the original feature icon wrappers and replaces the action controls | Simply using the partial can change appearance even if the outer CSS classes match |
| Image conventions conflict | Partial prefixes every image with `assets/`; factories/tests also use `vehicles/...` paths | Future storage uploads will resolve to the wrong URL without a media URL convention |
| Unknown specifications become invented facts | Partial defaults missing mileage to zero and transmission to Automatic | Public listings can misrepresent vehicles |
| Related vehicles have incomplete status filtering | Controller's related query uses publication and brand checks but no available-status restriction | Published archived, reserved or sold stock can appear in the proposed available recommendations |
| Customer workflows are not implemented | Seven public GET routes; no application POST routes, staff inventory screens or lead models | Selling, financing and contact templates are not working dealership workflows |
| Vendor form destinations remain | Shared layout posts to the theme vendor; seller template also has an external submission destination | These need owned handlers or a disabled submission state before public launch |

The database already models brands, vehicles, images and features, with KES prices, condition, status and publication dates. Extend this foundation with additive migrations as necessary. Do not rebuild it or reset existing data.

The earlier `INVENTORY_IMPLEMENTATION_PLAN.md` is historical context, not proof of current behavior. It contains conflicting approval/status notes and describes card wiring that the current page markup does not contain. The list page has a conditional result count, but its cards are static and the existing card/pagination partials are not connected. This review's repository findings take precedence for planning.

Verification: `php artisan route:list --except-vendor` reports seven GET/HEAD routes. `php artisan test --compact` passes six tests and 25 assertions against configured in-memory SQLite. These tests do not verify visual fidelity or working public inventory. Production/development database state and browser rendering were not verified during this review. The historical explanation for previous visual failures remains an inference from the markup, not a reproduced browser failure.

## 2. Kenyan market comparison

These are public customer-facing observations. They do not reveal the competitors' private backend implementations or prove an industry-wide standard. Sources accessed during this review; no customer submissions were made.

| Comparable product | Observable pattern | Apply to Konastone |
| --- | --- | --- |
| [Peach Cars buyer journey](https://blog.peachcars.co.ke/how-to-find-your-peach/) | Search by make/model/budget and inspection information supporting purchase decisions | Reliable filtering, accurate photos/specifications, inspection status and an approved report summary |
| [Autochek Kenya](https://autochek.africa/ke) | KSh prices, budget bands, mileage, engine capacity, location, foreign-used labels, contact-seller and finance actions | Structured Kenyan vehicle data, location and condition filters, enquiry capture and a separately defined finance enquiry |
| [Jiji Kenya cars](https://jiji.co.ke/cars) | Listings expose local/foreign-used condition, transmission, mileage, prices and seller context | Make condition and seller identity explicit; keep dealership contact and stock availability consistent |
| [Kai & Karo](https://www.kaiandkaro.com/) | Search-indexed homepage distinguishes direct import/international stock | Consider separating physical local stock from import-on-order enquiries if this matches Konastone's business |

Kai & Karo's direct page fetch failed, so the import observation is provisional and based on the indexed homepage. Do not base a detailed workflow on it without further verification. Peach's referenced buyer guide is older editorial material; Autochek and Jiji provide current listing observations.

The practical target is a trustworthy dealership catalogue with dependable lead follow-up. A multi-seller marketplace, escrow service or lending platform would be a separate business and technical scope.

## 3. Backend improvements, in priority order

### P0: dependable inventory

- Centralize public visibility. Available listings/homepage/recommendations must be published, available, and attached to active brands. Sold archive shows published sold stock. Reserved and sold detail URLs may remain accessible with accurate status; draft, archived, future, unpublished and inactive-brand records return 404. Confirm sold-price display before launch.
- Add validated, shared list/grid search: brand, model, condition, body, transmission, fuel, drivetrain, year range, price range, mileage and location as supported by actual stock. Reject arrays where scalars are expected, invalid enum values, negative ranges and reversed ranges. Allow-list sorting and preserve filters across pagination/view switching. Keep KES-only comparison in the first release.
- Generate collision-safe stable slugs, maintain sold timestamps, and enforce publication requirements. Changes to status and cover selection should use transactions where concurrent writes could violate invariants.
- Define image storage disk/path and one URL resolver. Preserve existing demo asset references during transition. Enforce a single cover through the write workflow; fall back to the first ordered image, then a neutral placeholder. Validate and re-encode uploaded public images; preserve gallery order and dimensions.
- Keep missing specifications visibly unknown. Keep chassis numbers and private owner records out of public output. Demo seed data contains illustrative specifications and repeated theme photos; it is not verified sale inventory and must not become production stock.

### P1: staff operations and lead conversion

- Build authenticated staff administration under `/admin`, with separate layout/assets. Start with owner/manager and sales permissions, explicit policies, login recovery, inventory CRUD, draft preview, publish/archive controls, image management and change history. Public theme integration does not require a new frontend framework or an admin package.
- Add `leads`: optional vehicle reference, enquiry type, customer contact, message, source, status, assigned staff member and follow-up timestamp. Keep a short activity history. Suggested progression: new → contacted → appointment → won/lost. Staff need an inbox and overdue follow-up view.
- Persist enquiries before sending queued notifications; retry delivery failures without duplicating leads. Validate input, use CSRF protection and rate limiting, preserve entered values on errors and show a clear success state.
- Configure verified phone/WhatsApp/email/branch details centrally. Vehicle WhatsApp links can include title, stock reference and URL; a click is not evidence that a message was delivered or a lead created.
- Implement seller submissions separately from live vehicles: contact, make/model/year, mileage, expected price, location, review status and moderated photos. Staff approval must be required before converting a submission to sale inventory.

### P2: trust and service workflows

- Add inspection records with inspection date, provider, status, approved public summary and separately protected supporting documents. Display only claims backed by actual inspections.
- Model appointments with requested/confirmed/cancelled states and staff confirmation. Use Africa/Nairobi for displayed appointment times and an explicit storage/timezone convention.
- Add finance enquiry and an illustrative repayment calculator. Specify rate type, term, deposit, fees and rounding before implementing calculations. Do not copy competitor rates, promise approval, or collect financial documents in the first enquiry flow.
- If importing is an actual offered service, add sourcing requests and import milestones separately from stock status. An overseas candidate is not an available local vehicle. Do not encode customs/tax assumptions without current official verification.
- Add basic operational metrics: leads by source/vehicle, first response time, appointments, conversions and ageing inventory. Establish backups with restore verification, production error monitoring, queue supervision and staff access controls before launch.

Defer M-Pesa deposits, automated finance decisions, escrow, multi-dealer accounts and external CRM integrations. Payments need a separately specified reservation/refund/reconciliation workflow; a payment button alone does not solve the current integration problem. Review applicable privacy obligations before collecting identity or finance documents; this report makes no legal compliance determination.

## 4. Integration strategy that preserves the UI

Data flow: named GET route → validated request → Eloquent query/controller → explicit view data → existing Blade HTML → existing theme CSS/JavaScript.

Preserve each page's wrappers, class lists, icon elements, image containers, IDs, data attributes and stylesheet/script order. Replace values and repeated records inside those boundaries. Keep query/business logic out of Blade. Reuse the existing partials only after restoring the exact page-specific markup; list/grid/sold/home cards can need distinct variants.

| Phase | Scope and likely files | Completion gate |
| --- | --- | --- |
| 0. Capture visual contract | Existing seven pages and `public/assets`; deterministic local fixtures and screenshots | Record desktop/mobile baselines and key interaction behavior before changes |
| 1. Harden read behavior | `VehicleController`, `Vehicle`, a shared inventory request/query if useful, feature tests | Visibility, slug lookup, validation, stable ordering, empty states and related inventory pass tests before public routing changes |
| 2. Connect list and detail | `routes/web.php`, `inventory-listing`, `single-inventory`, theme-matching card/pagination partials | Real vehicle names/prices/images; valid details and 404s; preserved DOM and responsive screenshots. Route and view changes ship together so links are functional |
| 3. Connect search/grid/sold | Existing views, filter request and a small scoped integration script if necessary | GET search works in browser; advanced controls submit; selection survives reload; grid/list preserve filters; sold badges and pagination are accurate |
| 4. Connect homepage | Home controller and bounded vehicle sections currently in `layouts/app` | Featured/latest/brand links use inventory rules while hero, section order, spacing and animation hooks match baseline |
| 5. Consolidate layouts | `layouts/app`, `pages/home`, shared header/footer/head/script partials | Separate appearance-preserving change: exactly one document, header/footer and script set; no homepage content leaks into inventory |
| 6. Staff and enquiries | New protected administration and owned form endpoints; existing forms retain styles | Staff can publish a car; visitor can enquire; staff can receive, assign and follow up; error/success states work |
| 7. Seller, finance and trust | Existing seller/calculator/detail views and corresponding workflow models | Moderated seller intake, tested estimates and evidence-backed inspection content; operational checks complete |

Specific integration rules:

1. Give inventory search a dedicated form ID and remove the behavioral `ajax-contact` hook after checking for CSS dependence. Retain its visual classes. Associate outside controls through the HTML `form` attribute where moving them would disturb layout; replace placeholder names/values with the agreed query fields. Verify submission in a browser because PHP tests do not execute the theme JavaScript.
2. Preserve the original feature icon wrappers. Match label semantics to icons: engine capacity uses cc, mileage uses km. Adding real data must not silently change card geometry or mislabel units.
3. Pass explicit data contracts: paginated `vehicles`, normalized filters, filter options, view mode; details receive `vehicle` and `relatedVehicles`; homepage receives named featured/latest collections. Format prices consistently as KSh without floating-point business calculations.
4. Use a compact theme-styled pagination window. The current partial renders every page number, which will become unwieldy. Empty results must say zero results and provide reset controls; never substitute fictional stock for an empty database or an outage.
5. Keep full-page GET navigation for initial search. If dynamic dropdowns or galleries are added, initialize only the affected theme widgets and avoid duplicate handlers. Preserve `nice-select`, Swiper and gallery requirements.
6. Resolve vendor endpoints before public release. Adapt the contact JavaScript to scoped owned forms and agreed response formats; do not apply its global selector to inventory search. Avoid rendering arbitrary server error HTML into the page.
7. Treat shared-layout extraction as its own change after successful data wiring. Retain page-specific variations. Do not load Vite/Tailwind into the Bootstrap public theme as part of this task.

## 5. Verification and release criteria

Capture matching screenshots at 390, 768, 1024 and 1440 px widths, with fixed data, fonts loaded, animation timing controlled and identical viewport settings. Compare header/hero/footer, grid columns, card height, image crop, typography, spacing, menus, gallery and forms. Expected content changes are acceptable; unexplained geometry or style changes fail review. Include long names/KSh prices, missing images/specs, zero/one/many results, reserved/sold details and validation errors. No browser screenshots were captured in this investigation, so visual preservation is not yet certified.

Backend tests must prove actual database-backed responses, not only template headings. Cover unavailable-stock exclusions, unknown slugs, combined filters, invalid input, pagination persistence, related-stock policy, private-field exclusion, staff authorization, upload rejection, lead persistence and notification failure. Verify schema-dependent invariants against a disposable MySQL database as well as fast SQLite tests; never reset an existing database.

For each implementation slice, run its affected tests, inspect browser console/network failures, compare visual baselines and review the diff for markup/asset changes. Use additive migrations and a reversible deployment for each slice. Roll back application wiring without dropping data if the gate fails. Once a page is integrated, remove its static-stock fallback; database failures should produce a controlled error, not demo listings.

## 6. Decisions and recommended first delivery

Proceed on the single-dealership assumption. Verified contact details, real vehicle photos/specifications, sold-price preference, staff roles and finance assumptions are needed for their respective production workflows; they do not block initial inventory work.

The first implementation delivery should be visual baselines plus one complete list → detail journey, including safe query behavior and functional search. Keep the remaining pages structurally intact until their turn. This addresses the concrete integration failure while creating a repeatable pattern for the rest of the site.

Repository setup completed during this review: PHP/Composer verified, Laravel Boost installed as a development dependency, and its generated guidelines, skills and MCP configuration installed. These setup changes are separate from the proposed application work. The Laravel best-practices skill informed the use of explicit view contracts, focused controllers, validated input and separate authorization boundaries.
