@extends('layouts.app')

@section('title', 'Sold Inventory | Konastone Autos and Imports')
@section('meta_description', 'View vehicles previously sold by Konastone Autos and Imports.')
@section('canonical', route('inventory.sold'))
@section('og_title', 'Sold Inventory | Konastone Autos and Imports')
@section('og_description', 'View vehicles previously sold by Konastone Autos and Imports.')

@section('page-sections')
<div class="breadcumb-wrapper" data-bg-src="{{ asset('assets/img/bg/breadcrumb-bg.jpg') }}" data-overlay="black" data-opacity="3">
<div class="container">
<div class="breadcumb-content">
<h1 class="breadcumb-title">Sold Inventory</h1>
<ul class="breadcumb-menu">
<li>
<a href="{{ url('/') }}">Home</a>
</li>
<li>Sold Inventory</li>
</ul>
</div>
</div>
</div>
<section class="left-sidebar-details space">
<div class="container">
<div class="row gy-4">
<div class="col-xxl-9 col-xl-8 col-lg-8">
<div class="row">
<div class="col-xl-12">
<div class="inventory-top-filer-wrap">
<div class="left-content">
<p>{{ isset($vehicles) ? "Showing ".$vehicles->firstItem()."–".$vehicles->lastItem()." of ".$vehicles->total()." vehicles" : "Showing 1–12 of 20 products" }}</p>
</div>
<div class="filter-search">
<div class="form-group">
<select name="select_make" id="select_makeh42" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Short By Latest</option>
<option value="Corolla">Newest First</option>
<option value="Civic">Oldest First</option>
<option value="Mustang">Height First</option>
<option value="X3">Mileage Highest</option>
</select>
</div>
<div class="icon-item">
<a href="{{ route('inventory.grid') }}">
<i class="fa-solid fa-list">
</i>
</a>
</div>
<div class="icon-item">
<a href="{{ route('inventory.index') }}">
<i class="fa-regular fa-grid">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
<div class="row gy-30 justify-content-center">
@if (isset($vehicles))
    @include('partials.sold-vehicle-cards', ['vehicles' => $vehicles])
    @if ($vehicles->isEmpty())
        <div class="col-12"><p class="text-center">No sold vehicles are currently published.</p></div>
    @endif
@else
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-1.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Ford Explorer XLT</a>
</h3>
<p class="box-text">
<span>Listed by:</span> BMW X3 M40i</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$17,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-2.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Toyota Corolla LE</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Ford Explorer XLT</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$16,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-3.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Honda Civic Sport</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Toyota Camry SE</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$18,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-4.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Nissan Altima SV</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Honda Accord LX</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$14,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-5.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Audi Q7 Premium</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Nissan Rogue SV</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$11,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-6.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Kia Sorento LX</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Audi A4 Quattro</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$19,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-7.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">JTesla Model Y</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Hyundai Santa Fe</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$27,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-8.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Mazda CX-5 Sport</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Tesla Model 3</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$21,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-9.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">BMW X5 MY</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Lexus ES 350</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$23,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-10.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Genesis G80 Sport</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Infiniti Q50 Red</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$25,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-11.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">Ram 1500 Rebel</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Cadillac XT5 Sport</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$29,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
<div class="feature-list-1 sold">
<div class="box-icon">
<img src="{{ asset('assets/img/featured/featured-1-12.jpg') }}" alt="image">
<div class="actions">
<a href="#" class="icon-btn">
<i class="fa-regular fa-tag">
</i>
</a> <a href="#" class="icon-btn">
<i class="far fa-heart">
</i>
</a>
</div>
<div class="sold-inventory">
<img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="img">
</div>
</div>
<div class="car-content">
<div class="media-body">
<h3 class="box-title">
<a href="{{ route('inventory.index') }}">GMC Yukon Denali</a>
</h3>
<p class="box-text">
<span>Listed by:</span> Acura TLX Type</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon">
</div>120cc</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>Manual</li>
<li class="divider">
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>Petrol</li>
</ul>
<div class="car-bottom">
<h6 class="box-title">$26,000</h6>
<a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
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
<div class="th-pagination mt-xl-3 mb-0">
<ul>
<li>
<a href="{{ route('inventory.index') }}">
<i class="far fa-arrow-left">
</i>
</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">1</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">2</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">3</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">
<i class="far fa-arrow-right">
</i>
</a>
</li>
</ul>
</div>
@endif
</div>
</div>
</div>
<div class="col-xxl-3 col-xl-3 col-lg-4">
<aside class="sidebar-area">
<div class="widget widget-style-smoke search-top">
<div class="h5 box-title">Search Options</div>
</div>
<div class="widget widget-style-smoke search">
<div class="inventory-search-item">
<div class="form-group">
<input type="text" class="form-control" name="name" id="name" placeholder="Location"> <i class="fa-solid fa-location-crosshairs">
</i>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search1" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Condition</option>
<option value="Corolla">New</option>
<option value="Civic">Used</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<h5 class="box-title">Type</h5>
<div class="check-box-wrap">
<div class="form-group">
<input type="checkbox" id="Convertible"> <label for="Convertible">Convertible</label>
</div>
<div class="form-group">
<input type="checkbox" id="Coupe"> <label for="Coupe">Coupe</label>
</div>
<div class="form-group">
<input type="checkbox" id="Hatchback"> <label for="Hatchback">Hatchback</label>
</div>
<div class="form-group">
<input type="checkbox" id="Hybrid"> <label for="Hybrid">Hybrid</label>
</div>
<div class="form-group">
<input type="checkbox" id="Sedan"> <label for="Sedan">Sedan</label>
</div>
<div class="form-group">
<input type="checkbox" id="SUV"> <label for="SUV">SUV</label>
</div>
<div class="form-group">
<input type="checkbox" id="Sedan1"> <label for="Sedan1">Sedan</label>
</div>
<div class="form-group">
<input type="checkbox" id="SUV2"> <label for="SUV2">SUV</label>
</div>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search2" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Select Make</option>
<option value="Acura">Acura</option>
<option value="Audi">Audi</option>
<option value="BMW">BMW</option>
<option value="Dodge">Dodge</option>
<option value="Honda">Honda</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search3" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Select Model</option>
<option value="CX-30">CX-30</option>
<option value="Charge">Charge</option>
<option value="Civic">Civic</option>
<option value="Cruze">Cruze</option>
<option value="Fusion">Fusion</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search4" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Select Body</option>
<option value="Convertible">Convertible</option>
<option value="Coupe">Coupe</option>
<option value="Sedan">Sedan</option>
<option value="sportcar">sportcar</option>
<option value="Suv">Suv</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search5" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Select Color</option>
<option value="Het Black">Het Black</option>
<option value="Grey">Grey</option>
<option value="Beige">Beige</option>
<option value="Brown">Brown</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<h5 class="box-title">Price</h5>
<div class="price_slider_wrapper">
<div class="price_slider">
</div>
<div class="price_label">
<span class="from">$0</span> <span class="to">$70</span>
</div>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search6" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Transmission</option>
<option value="Manual">Manual</option>
<option value="Automatic">Automatic</option>
<option value="Semi-Automatic">Semi-Automatic</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search7" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Fuel Type</option>
<option value="Petrol">Petrol</option>
<option value="Electric">Electric</option>
<option value="Hybrid">Hybrid</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search8" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Select Door</option>
<option value="2_Doors">2 Doors</option>
<option value="3_Doors">3 Doors</option>
<option value="4_Doors">4 Doors</option>
<option value="5_Doors">5 Doors</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search9" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Cylinder</option>
<option value="Petrol">Petrol</option>
<option value="Electric">Electric</option>
<option value="Hybrid">Hybrid</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<div class="form-group">
<select name="select_make" id="inventory_search10" class="form-select nice-select">
<option value="" disabled="disabled" selected="selected" hidden>Years</option>
<option value="2024">2024</option>
<option value="2023">2023</option>
<option value="2022">2022</option>
<option value="2021">2021</option>
</select>
</div>
</div>
<div class="inventory-search-item">
<h5 class="box-title">Key Features</h5>
<div class="check-box-wrap">
<div class="form-group">
<input type="checkbox" id="Conditioner"> <label for="Conditioner">Air Conditioner</label>
</div>
<div class="form-group">
<input type="checkbox" id="Android"> <label for="Android">Android Auto</label>
</div>
<div class="form-group">
<input type="checkbox" id="Anti-lock-Braking"> <label for="Anti-lock-Braking">Anti-lock Braking</label>
</div>
<div class="form-group">
<input type="checkbox" id="Bluetooth"> <label for="Bluetooth">Bluetooth</label>
</div>
<div class="form-group">
<input type="checkbox" id="Brake_Assist"> <label for="Brake_Assist">Brake Assist</label>
</div>
<div class="form-group">
<input type="checkbox" id="Child_Safety_Locks"> <label for="Child_Safety_Locks">Child Safety Locks</label>
</div>
<div class="form-group">
<input type="checkbox" id="Driver_Air_Bag"> <label for="Driver_Air_Bag">Driver Air Bag</label>
</div>
<div class="form-group">
<input type="checkbox" id="Driver_Air_Bag2"> <label for="Driver_Air_Bag2">Driver Air Bag</label>
</div>
</div>
</div>
<div class="inventory-search-item">
<a href="#" class="th-btn left-icon style-2 w-100 mb-3">
<i class="fa-solid fa-magnifying-glass">
</i> Find Cars </a>
<a href="#" class="th-btn left-icon style3 w-100">Rest Cars</a>
</div>
</div>
</aside>
</div>
</div>
</div>
</section>
@endsection
