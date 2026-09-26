@extends('layouts.app')

@section('title', 'Inventory Listing | Konastone Autos and Imports')
@section('meta_description', 'Browse available vehicles at Konastone Autos and Imports in Mombasa, Kenya.')
@section('canonical', route('inventory.index'))
@section('og_title', 'Inventory Listing | Konastone Autos and Imports')
@section('og_description', 'Browse available vehicles at Konastone Autos and Imports in Mombasa, Kenya.')

@section('page-sections')
<div
      class="breadcumb-wrapper style-2"
      data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.jpg') }}"
      data-overlay="black"
      data-opacity="3"
    >
      <div class="container">
        <div class="breadcumb-content">
          <h1 class="breadcumb-title">Inventory List View</h1>
          <ul class="breadcumb-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Inventory</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="reservation-area style-2 home-4-style">
      <div class="container th-container">
        <div class="reservation-wrapper">
          <div class="reservation-form">
            <form
              id="inventory-search"
              action="{{ route('inventory.index') }}"
              method="GET"
            >
              @if (filled($filters['q'] ?? null))
                <input type="hidden" name="q" value="{{ $filters['q'] }}">
              @endif
              <div class="row">
                <div class="col-12">
                  <div class="select-group-wrapper">
                    <div class="form-group">
                      <select
                        name="brand"
                        id="select_make1"
                        class="form-select nice-select"
                      >
                        <option
                          value=""
                          disabled="disabled"
                          @selected(blank($filters['brand'] ?? null))
                          hidden
                        >
                          Select Make
                        </option>
                        @foreach ($filterOptions['brands'] as $slug => $name)
                          <option value="{{ $slug }}" @selected(($filters['brand'] ?? null) === $slug)>{{ $name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select
                        name="model"
                        id="select_make2"
                        class="form-select nice-select"
                      >
                        <option
                          value=""
                          disabled="disabled"
                          @selected(blank($filters['model'] ?? null))
                          hidden
                        >
                          Select Model
                        </option>
                        @foreach ($filterOptions['models'] as $model)
                          <option value="{{ $model }}" @selected(($filters['model'] ?? null) === $model)>{{ $model }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select
                        name="exterior_color"
                        id="select_make3-color"
                        class="form-select nice-select"
                      >
                        <option
                          value=""
                          disabled="disabled"
                          @selected(blank($filters['exterior_color'] ?? null))
                          hidden
                        >
                          Select Color
                        </option>
                        @foreach ($filterOptions['colors'] as $color)
                          <option value="{{ $color }}" @selected(($filters['exterior_color'] ?? null) === $color)>{{ $color }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select
                        name="body_type"
                        id="select_make3-body"
                        class="form-select nice-select"
                      >
                        <option
                          value=""
                          disabled="disabled"
                          @selected(blank($filters['body_type'] ?? null))
                          hidden
                        >
                          Select Body
                        </option>
                        @foreach ($filterOptions['body_types'] as $bodyType)
                          <option value="{{ $bodyType }}" @selected(($filters['body_type'] ?? null) === $bodyType)>{{ ucfirst($bodyType) }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="advance-btn-wrapper">
                      <div class="advance-search-btn">
                        <div class="search-btn-item">
                          <i class="fa-solid fa-sliders-up"></i>
                        </div>
                      </div>
                      <button class="th-btn w-100" type="submit">
                        Search Cars <i class="fas fa-arrow-up-right"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="advance-search-wrapper stye-2 home-4-style">
              <div class="form-group">
                <select
                  name="drivetrain"
                  form="inventory-search"
                  id="select_make1-drive"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Drive Type
                  </option>
                  <option value="2wd">2WD</option>
                  <option value="fwd">FWD – Front-wheel drive</option>
                  <option value="awd">AWD – All-wheel drive</option>
                  <option value="4wd">4WD – Four-wheel drive</option>
                </select>
              </div>
              <div class="form-group">
                <select
                  name="transmission"
                  form="inventory-search"
                  id="select_make2-trans"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Transmission
                  </option>
                  <option value="cvt">CVT</option>
                  <option value="automatic">Automatic</option>
                  <option value="dct">DCT</option>
                  <option value="manual">Manual</option>
                </select>
              </div>
              <div class="form-group">
                <select
                  name="fuel_type"
                  form="inventory-search"
                  id="select_Fuel_type"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Fuel Type
                  </option>
                  <option value="diesel">Diesel</option>
                  <option value="electric">Electric</option>
                  <option value="hybrid">Hybrid</option>
                  <option value="petrol">Petrol</option>
                </select>
              </div>
              <div class="form-group">
                <div class="price_slider_wrapper">
                  <p>Price (KSh)</p>
                  <div class="row g-2">
                    <div class="col-6"><input class="form-control" type="number" name="min_price" form="inventory-search" min="0" step="1" value="{{ $filters['min_price'] ?? '' }}" placeholder="Min"></div>
                    <div class="col-6"><input class="form-control" type="number" name="max_price" form="inventory-search" min="0" step="1" value="{{ $filters['max_price'] ?? '' }}" placeholder="Max"></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <select
                  name="cylinders"
                  form="inventory-search"
                  id="select_Cylinders"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Cylinders
                  </option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="6">6</option>
                  <option value="5">5</option>
                  <option value="8">8</option>
                  <option value="10">10</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="form-group">
                <select
                  name="doors"
                  form="inventory-search"
                  id="select_Door"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Door
                  </option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
              </div>
              <div class="form-group">
                <select
                  name="min_year"
                  form="inventory-search"
                  id="select_year"
                  class="form-select nice-select"
                >
                  <option
                    value=""
                    disabled="disabled"
                    selected="selected"
                    hidden
                  >
                    Year
                  </option>
                  @for ($year = now()->year + 1; $year >= 2000; $year--)
                    <option value="{{ $year }}" @selected(($filters['min_year'] ?? null) == $year)>{{ $year }}</option>
                  @endfor
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="feature-sec-1 space">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="inventory-top-filer-wrap">
              <div class="left-content"><p>{{ isset($vehicles) ? "Showing ".$vehicles->firstItem()."–".$vehicles->lastItem()." of ".$vehicles->total()." vehicles" : "Showing 1–12 of 20 products" }}</p></div>
              <div class="filter-search">
                <div class="form-group">
                  <select
                    name="sort"
                    form="inventory-search"
                    id="select_makeh42"
                    class="form-select nice-select"
                  >
                    <option
                      value="newest"
                      @selected(($filters['sort'] ?? 'newest') === 'newest')
                      hidden
                    >
                      Short By Latest
                    </option>
                    <option value="price_low" @selected(($filters['sort'] ?? null) === 'price_low')>Price: Low to high</option>
                    <option value="price_high" @selected(($filters['sort'] ?? null) === 'price_high')>Price: High to low</option>
                    <option value="year" @selected(($filters['sort'] ?? null) === 'year')>Newest model year</option>
                    <option value="mileage" @selected(($filters['sort'] ?? null) === 'mileage')>Lowest mileage</option>
                  </select>
                </div>
                <div class="icon-item">
                  <a href="{{ route('inventory.grid') }}"
                    ><i class="fa-solid fa-list"></i
                  ></a>
                </div>
                <div class="icon-item active">
                  <a href="{{ route('inventory.index') }}"
                    ><i class="fa-regular fa-grid"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row gy-30">
          @if (isset($vehicles))
            @if ($vehicles->isEmpty())
              <div class="col-12 text-center">
                <p>No vehicles match your search.</p>
                <a class="th-btn sm style3" href="{{ route('inventory.index') }}">Reset Search <i class="fas fa-arrow-up-right"></i></a>
              </div>
            @else
              @include('partials.vehicle-cards', ['vehicles' => $vehicles, 'viewMode' => 'list'])
            @endif
          @else
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-1.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Ford Explorer XLT</a>
                  </h3>
                  <p class="box-text"><span>Listed by:</span> BMW X3 M40i</p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$17,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-2.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Toyota Corolla LE</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Ford Explorer XLT
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$16,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-3.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Honda Civic Sport</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Toyota Camry SE
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$18,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-4.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Nissan Altima SV</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Honda Accord LX
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$14,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-5.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Audi Q7 Premium</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Nissan Rogue SV
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$11,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-6.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Kia Sorento LX</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Audi A4 Quattro
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$19,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-7.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">JTesla Model Y</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Hyundai Santa Fe
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$27,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-8.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Mazda CX-5 Sport</a>
                  </h3>
                  <p class="box-text"><span>Listed by:</span> Tesla Model 3</p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$21,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-9.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">BMW X5 MY</a>
                  </h3>
                  <p class="box-text"><span>Listed by:</span> Lexus ES 350</p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$23,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-10.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Genesis G80 Sport</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Infiniti Q50 Red
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$25,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-11.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">Ram 1500 Rebel</a>
                  </h3>
                  <p class="box-text">
                    <span>Listed by:</span> Cadillac XT5 Sport
                  </p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$29,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="feature-list-1 list">
              <div class="box-icon">
                <img src="{{ asset('assets/img/featured/featured-1-12.jpg') }}" alt="image" />
                <div class="actions">
                  <a href="#" class="icon-btn"
                    ><i class="fa-regular fa-tag"></i
                  ></a>
                  <a href="#" class="icon-btn"><i class="far fa-heart"></i></a>
                </div>
              </div>
              <div class="car-content">
                <div class="media-body">
                  <h3 class="box-title">
                    <a href="{{ route('inventory.index') }}">GMC Yukon Denali</a>
                  </h3>
                  <p class="box-text"><span>Listed by:</span> Acura TLX Type</p>
                </div>
                <ul class="car-feature">
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}"
                        alt="icon"
                      />
                    </div>
                    120cc
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Manual
                  </li>
                  <li class="divider"></li>
                  <li>
                    <div class="icon">
                      <img
                        src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}"
                        alt="icon"
                      />
                    </div>
                    Petrol
                  </li>
                </ul>
                <div class="car-bottom">
                  <h6 class="box-title">$26,000</h6>
                  <a class="th-btn sm style3" href="{{ route('inventory.index') }}"
                    >View Details <i class="fas fa-arrow-up-right"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
          @endif
        </div>

        <div class="row">
          <div class="col-lg-12 mt-5 text-center">
            @if (isset($vehicles))
              @include('partials.vehicle-pagination', ['vehicles' => $vehicles, 'class' => 'mt-xl-3 mb-0'])
            @else
            <div class="th-pagination th-pagination mt-xl-3 mb-0">
              <ul>
                <li>
                  <a href="{{ route('inventory.index') }}"
                    ><i class="far fa-arrow-left"></i
                  ></a>
                </li>
                <li><a href="{{ route('inventory.index') }}">1</a></li>
                <li><a href="{{ route('inventory.index') }}">2</a></li>
                <li><a href="{{ route('inventory.index') }}">3</a></li>
                <li>
                  <a href="{{ route('inventory.index') }}"
                    ><i class="far fa-arrow-right"></i
                  ></a>
                </li>
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
@endsection
