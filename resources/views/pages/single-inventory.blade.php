@extends('layouts.app')

@section('title', trim($vehicle->year . ' ' . $vehicle->brand->name . ' ' . $vehicle->model) . ' | Konastone Autos and Imports')
@section('meta_description', 'View vehicle details, specifications, and photos from Konastone Autos and Imports.')
@section('canonical', route('inventory.show', $vehicle->slug))
@section('og_title', trim($vehicle->year . ' ' . $vehicle->brand->name . ' ' . $vehicle->model) . ' | Konastone Autos and Imports')
@section('og_description', 'View vehicle details, specifications, and photos from Konastone Autos and Imports.')

@section('page-sections')
<div class="breadcumb-wrapper single-inventory">
<div class="container">
<div class="breadcumb-content">
<ul class="breadcumb-menu">
<li>
<a href="{{ url('/') }}">Home</a>
</li>
<li>Inventory</li>
<li>Single Inventory</li>
</ul>
</div>
</div>
</div>
<section class="th-inventory-wrapper inventory-details space-extra-bottom">
<div class="th-container">
<div class="single-inventory-wrapper">
@forelse ($galleryImages as $image)
@php($imageUrl = $image->url('detail'))
<div class="single-inventory-item {{ $galleryCover && $image->is($galleryCover) ? 'active' : '' }}" data-bg-src="{{ $imageUrl }}">
<div class="single-inventory-img">
<div class="single-inventory-item-content">
<a href="{{ $imageUrl }}" class="simple-icon-btn popup-image">
<i class="fa-regular fa-image">
</i> View All Image</a>
</div>
</div>
</div>
@empty
<div class="single-inventory-item active" data-bg-src="{{ asset('assets/img/featured/single-inventory-gal-1.jpg') }}">
<div class="single-inventory-img">
</div>
</div>
@endforelse
@if ($hiddenGalleryImages->isNotEmpty())
<div class="d-none" aria-hidden="true">
@foreach ($hiddenGalleryImages as $image)
<a href="{{ $image->url('detail') }}" class="popup-image" tabindex="-1"></a>
@endforeach
</div>
@endif
</div>
</div>
<div class="container">
<div class="row gy-3 gx-40">
<div class="col-xxl-8 col-lg-7">
<div class="th-inventory inventory-single">
<div class="inventory-single-top">
<div class="media-body">
<h2 class="box-title">{{ $vehicle->year }} {{ $vehicle->brand->name }} {{ $vehicle->model }}</h2>
<p class="box-text">
<span>Listed by:</span> Konastone Autos and Imports</p>
</div>
<ul class="car-feature">
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-date-1-1.svg') }}" alt="icon">
</div>
<p>{{ $vehicle->year }}</p>
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>
<p>{{ $vehicle->engine_capacity ? number_format($vehicle->engine_capacity).' cc' : 'Not listed' }}</p>
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon">
</div>
<p>{{ $vehicle->transmission ? ucfirst($vehicle->transmission) : 'Not listed' }}</p>
</li>
<li>
<div class="icon">
<img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon">
</div>
<p>{{ $vehicle->fuel_type ? ucfirst($vehicle->fuel_type) : 'Not listed' }}</p>
</li>
</ul>
</div>
<div class="single-inventory-content">
<h5 class="title">Description</h5>
@if ($vehicle->description)
<p>{{ $vehicle->description }}</p>
@endif
</div>
</div>
<div class="vehicle-overview-wrap">
<h5 class="title">Vehicle Overview</h5>
<div class="vehicle-overview-body">
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-1.svg') }}" alt="icon">
</div>
<p>Body</p>
</div>
<div class="right">
<p>{{ $vehicle->body_type ? ucfirst($vehicle->body_type) : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-2.svg') }}" alt="icon">
</div>
<p>Transmission</p>
</div>
<div class="right">
<p>{{ $vehicle->transmission ? ucfirst($vehicle->transmission) : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-3.svg') }}" alt="icon">
</div>
<p>Condition</p>
</div>
<div class="right">
<p>{{ ucfirst(str_replace('_', ' ', $vehicle->condition)) }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-4.svg') }}" alt="icon">
</div>
<p>Mileage</p>
</div>
<div class="right">
<p>{{ $vehicle->mileage ? number_format($vehicle->mileage).' km' : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-5.svg') }}" alt="icon">
</div>
<p>Drive Type</p>
</div>
<div class="right">
<p>{{ $vehicle->drivetrain ? strtoupper($vehicle->drivetrain) : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-6.svg') }}" alt="icon">
</div>
<p>Engine Size</p>
</div>
<div class="right">
<p>{{ $vehicle->engine ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-7.svg') }}" alt="icon">
</div>
<p>Fuel Type</p>
</div>
<div class="right">
<p>{{ $vehicle->fuel_type ? ucfirst($vehicle->fuel_type) : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-8.svg') }}" alt="icon">
</div>
<p>Door</p>
</div>
<div class="right">
<p>{{ $vehicle->doors ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-8.svg') }}" alt="icon">
</div>
<p>Cylinders</p>
</div>
<div class="right">
<p>{{ $vehicle->cylinders ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-9.svg') }}" alt="icon">
</div>
<p>Engine capacity</p>
</div>
<div class="right">
<p>{{ $vehicle->engine_capacity ? number_format($vehicle->engine_capacity).' cc' : 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-10.svg') }}" alt="icon">
</div>
<p>Year</p>
</div>
<div class="right">
<p>{{ $vehicle->year }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-11.svg') }}" alt="icon">
</div>
<p>Color</p>
</div>
<div class="right">
<p>{{ $vehicle->exterior_color ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-12.svg') }}" alt="icon">
</div>
<p>Stock number</p>
</div>
<div class="right">
<p>{{ $vehicle->stock_number ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-13.svg') }}" alt="icon">
</div>
<p>Location</p>
</div>
<div class="right">
<p>{{ $vehicle->location ?: 'Not listed' }}</p>
</div>
</div>
<div class="overview-item">
<div class="left">
<div class="icon">
<img src="{{ asset('assets/img/icon/inventory-details-1-14.svg') }}" alt="icon">
</div>
<p>Stock id</p>
</div>
<div class="right">
<p>{{ $vehicle->status === \App\Enums\VehicleStatus::Reserved ? 'Reserved' : ($vehicle->status === \App\Enums\VehicleStatus::Sold ? 'Sold' : 'Available') }}</p>
</div>
</div>
</div>
</div>
<div class="vehicle-features-wrap">
<h5 class="title">Vehicle Features</h5>
<div class="sing-invent-features-body">
<div class="sing-invent-features-item">
<h4 class="box-title">Included Features</h4>
<div class="checklist vehicle-features">
<ul>
@forelse ($vehicle->features as $feature)
<li>{{ $feature->name }}</li>
@empty
<li>Features not listed</li>
@endforelse
</ul>
</div>
</div>
</div>
</div>
<div class="sing-invent-video-wrap">
<div class="sing-invent-video">
<img src="{{ asset('assets/img/featured/single-inventory-details-video-1.jpg') }}" alt="Image">
<div class="video-box1">
<a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-btn popup-video">
<i class="fa-sharp fa-solid fa-play">
</i>
</a>
</div>
</div>
</div>
<div class="sing-invent-map-wrap">
<h5 class="title">Location</h5>
<div class="sing-invent-map">
<div class="checklist">
<ul>
<li>
<i class="fa-solid fa-location-dot">
</i> {{ $vehicle->location ?: 'Location not listed' }}</li>
</ul>
</div>
</div>
</div>
<div class="contact-form style-3 sing-inventory">
<div class="title-area mb-35">
<h4 class="sec-title">Car Loan Calculator</h4>
<p class="box-text">Estimate your monthly auto loan payments with this calculator.</p>
</div>
<form action="#" method="GET" class="quote-form">
<div class="row">
<div class="form-group col-md-6">
<label for="Priceofvehicles">Price of vehicles</label> <input type="text" class="form-control pill" name="name" id="Priceofvehicles" placeholder="$20000">
</div>
<div class="form-group col-md-6">
<label for="Interest_Rate">Interest Rate</label> <input type="email" class="form-control pill" name="rate" id="Interest_Rate" placeholder="10%">
</div>
<div class="form-group col-md-6">
<label for="Terms">Terms</label> <input type="email" class="form-control pill" name="rate" id="Terms" placeholder="10%">
</div>
<div class="form-group col-md-6">
<label for="Down_payment">Down payment</label> <input type="email" class="form-control pill" name="rate" id="Down_payment" placeholder="Down payment">
</div>
<div class="col-12">
<ul class="contact-form__bottom">
<li>
<p>Down payment amount</p>
<p>$12,000</p>
</li>
<li>
<p>Amount financed</p>
<p>$8,000</p>
</li>
<li>
<p>Down payment amount</p>
<p>$480,00</p>
</li>
</ul>
</div>
<div class="form-btn col-12">
<button class="th-btn w-100">Apply for loan <i class="fas fa-arrow-up-right">
</i>
</button>
</div>
</div>
<p class="form-messages mb-0 mt-3">
</p>
</form>
</div>
</div>
<div class="col-xxl-4 col-lg-5">
<aside class="sidebar-area">
<div class="widget widget-style-smoke shadow-style">
<div class="inventory-info-wrap">
<a href="#" class="inventory-info-item">
<p>Save</p>
<div class="icon">
<i class="fa-regular fa-tag">
</i>
</div>
</a>
<a href="#" class="inventory-info-item">
<p>Compare</p>
<div class="icon">
<i class="fa-solid fa-code-compare">
</i>
</div>
</a>
<a href="#" class="inventory-info-item">
<p>Share</p>
<div class="icon">
<i class="fa-sharp fa-regular fa-share-nodes">
</i>
</div>
</a>
</div>
</div>
<div class="widget widget-style-smoke shadow-style">
<div class="inventory-price-wrap">
<h5 class="box-title">Our Price</h5>
<div class="inventory-price-top">
<h6 class="box-title">KSh {{ number_format((float) $vehicle->price, 0) }} @if ($vehicle->previous_price)<del class="box-title">KSh {{ number_format((float) $vehicle->previous_price, 0) }}</del>@endif
</h6>
@if ($vehicle->previous_price && $vehicle->previous_price > $vehicle->price)<p class="saving">Price reduction: KSh {{ number_format((float) ($vehicle->previous_price - $vehicle->price), 0) }}</p>@endif
</div>
<div class="inventory-price-bottom">
<a href="#" class="th-btn left-icon icon-1 style-2 w-100" aria-disabled="true">
<i class="fa-regular fa-tag">
</i> Make An Offer Price </a>
<a href="#" class="th-btn left-icon style3 bg-black text-white w-100" aria-disabled="true">
<i class="fa-solid fa-steering-wheel">
</i> Schedule Test Drive</a>
</div>
</div>
</div>
<div class="widget widget-style-smoke shadow-style">
<div class="inventory-owner-wrap">
<div class="inventory-owner-top">
<div class="thumb">
<img src="{{ asset('assets/img/deal/boniface.webp') }}" alt="Boniface">
</div>
<div class="content">
<h6 class="box-title">Boniface</h6>
<p class="saving">Vehicle enquiry service</p>
</div>
</div>
<div class="inventory-owner-body">
<div class="info-box">
<div class="info-box_icon">
<i class="fa-solid fa-location-dot">
</i>
</div>
<div class="info-contnt">
<p class="info-box_text">Get Direction</p>
</div>
</div>
<div class="info-box">
<div class="info-box_icon">
<i class="fa-solid fa-phone">
</i>
</div>
<div class="info-contnt">
<p class="info-box_text">
<a href="tel:{{ config('dealership.contact.phone_formatted') }}" class="info-box_link">{{ config('dealership.contact.phone') }}</a>
</p>
</div>
</div>
</div>
<div class="inventory-owner-bottom">
<a href="#" class="th-btn style-2 w-100" aria-disabled="true">Message Dealer <i class="fas fa-arrow-up-right">
</i>
</a> <a href="{{ config('dealership.contact.whatsapp_url') }}" class="th-btn style3 whatsapp w-100" target="_blank" rel="noopener noreferrer"><img src="{{ asset('assets/img/icon/whatsapp.svg') }}" alt="" class="whatsapp-brand-icon" aria-hidden="true"> Chat Via WhatsApp
</a> <a href="{{ route('inventory.index') }}" class="th-btn style3 dealer w-100">View All stock at this dealer <i class="fas fa-arrow-up-right">
</i>
</a>
</div>
</div>
</div>
</aside>
</div>
</div>
</div>
</section>
<section class="space-bottom" id="related-sec">
<div class="container">
<div class="row justify-content-center">
<div class="col-xxl-7 col-xl-7">
<div class="title-area text-center">
<h2 class="sec-title">Related Inventory</h2>
</div>
</div>
</div>
<div class="slider-area">
<div class="swiper th-slider has-shadow" id="relatedSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}, "autoHeight": "true"}'>
<div class="swiper-wrapper">
@if ($relatedVehicles->isNotEmpty())
@include('partials.related-vehicle-cards', ['relatedVehicles' => $relatedVehicles])
@elseif (false)
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
<div class="swiper-slide">
<div class="feature-list-1">
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
</div>
@endif
<button data-slider-prev="#relatedSlider1" class="slider-arrow slider-prev">
<i class="far fa-arrow-left">
</i>
</button> <button data-slider-next="#relatedSlider1" class="slider-arrow slider-next">
<i class="far fa-arrow-right">
</i>
</button>
</div>
</div>
</section>
@endsection
