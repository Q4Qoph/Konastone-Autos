<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from html.themehour.net/kars/demo/inventory-sold.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2026 10:16:17 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Konastone Autos and Imports - Car Dealership HTML Template - Sold Inventory</title>
<meta name="author" content="Konastone Autos and Imports">
<meta name="description" content="Konastone Autos and Imports - Car Dealership HTML Template">
<meta name="keywords" content="Konastone Autos and Imports - Car Dealership HTML Template">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
@include('partials.favicon')
<link rel="preconnect" href="../../../fonts.googleapis.com/index.html">
<link rel="preconnect" href="../../../fonts.gstatic.com/index.html" crossorigin>
<link href="../../../fonts.googleapis.com/css2a956.css?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Play:wght@400;700&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/konastone-overrides.css') }}">
</head>
<body class="">
<div class="slider-drag-cursor">&lt;DRAG&gt;</div>
<div class="preloader">
<button class="th-btn preloaderCls">Cancel Preloader</button>
<div class="preloader-inner">
<div class="loader">
</div>
</div>
</div>
<div class="color-scheme">
<button class="switchIcon">
<i class="fa-solid fa-palette">
</i>
</button>
<h4 class="color-scheme-title">
<i class="far fa-palette">
</i> Color Switcher</h4>
<p class="color-scheme-text">Check template with your color</p>
<div class="color-switch-btns">
<button data-color="#6240CF">
<i class="fa-solid fa-droplet">
</i>
</button> <button data-color="#068FFF">
<i class="fa-solid fa-droplet">
</i>
</button> <button data-color="#044DBC">
<i class="fa-solid fa-droplet">
</i>
</button> <button data-color="#FFAF00">
<i class="fa-solid fa-droplet">
</i>
</button> <button data-color="#F80000">
<i class="fa-solid fa-droplet">
</i>
</button> <button data-color="#231E7A">
<i class="fa-solid fa-droplet">
</i>
</button>
</div>
<p class="color-scheme-text">Or custom color..</p>
<input type="color" id="thcolorpicker" value="#068FFF">
</div>
<div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
<div class="sidemenu-content">
<button class="closeButton sideMenuCls">
<i class="far fa-times">
</i>
</button>
<div class="widget woocommerce widget_shopping_cart">
<h3 class="widget_title">Shopping cart</h3>
<div class="widget_shopping_cart_content">
<ul class="woocommerce-mini-cart cart_list product_list_widget">
<li class="woocommerce-mini-cart-item mini_cart_item">
<a href="#" class="remove remove_from_cart_button">
<i class="far fa-times">
</i>
</a> <a href="#">
<img src="{{ asset('assets/img/product/product_1_1.png') }}" alt="Cart Image">Bosco Apple Fruit</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>940.00</span>
</span>
</li>
<li class="woocommerce-mini-cart-item mini_cart_item">
<a href="#" class="remove remove_from_cart_button">
<i class="far fa-times">
</i>
</a> <a href="#">
<img src="{{ asset('assets/img/product/product_1_2.png') }}" alt="Cart Image">Green Cauliflower</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>899.00</span>
</span>
</li>
<li class="woocommerce-mini-cart-item mini_cart_item">
<a href="#" class="remove remove_from_cart_button">
<i class="far fa-times">
</i>
</a> <a href="#">
<img src="{{ asset('assets/img/product/product_1_3.png') }}" alt="Cart Image">Mandarin orange</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>756.00</span>
</span>
</li>
<li class="woocommerce-mini-cart-item mini_cart_item">
<a href="#" class="remove remove_from_cart_button">
<i class="far fa-times">
</i>
</a> <a href="#">
<img src="{{ asset('assets/img/product/product_1_4.png') }}" alt="Cart Image">Shallot Red onion</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>723.00</span>
</span>
</li>
<li class="woocommerce-mini-cart-item mini_cart_item">
<a href="#" class="remove remove_from_cart_button">
<i class="far fa-times">
</i>
</a> <a href="#">
<img src="{{ asset('assets/img/product/product_1_5.png') }}" alt="Cart Image">Sour Red Cherry</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>1080.00</span>
</span>
</li>
</ul>
<p class="woocommerce-mini-cart__total total">
<strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount">
<span class="woocommerce-Price-currencySymbol">$</span>4398.00</span>
</p>
<p class="woocommerce-mini-cart__buttons buttons">
<a href="cart.html" class="th-btn wc-forward">View cart</a> <a href="checkout.html" class="th-btn checkout wc-forward">Checkout</a>
</p>
</div>
</div>
</div>
</div>
<div class="popup-search-box d-none d-lg-block">
<button class="searchClose">
<i class="fal fa-times">
</i>
</button>
<form action="#">
<input type="text" placeholder="What are you looking for?"> <button type="submit">
<i class="fal fa-search">
</i>
</button>
</form>
</div>
<div class="th-menu-wrapper">
<div class="th-menu-area text-center">
<button class="th-menu-toggle">
<i class="fal fa-times">
</i>
</button>
<div class="mobile-logo">
<a href="{{ url('/') }}">
<img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports">
</a>
</div>
<div class="th-mobile-menu">
<ul>
<li class="menu-item-has-children active">
<a href="{{ url('/') }}">Home</a>
<ul class="sub-menu">
<li>
<a href="{{ url('/') }}">Home Car Dealership</a>
</li>
<li>
<a href="home-2.html">Home Bike Dealership</a>
</li>
<li>
<a href="home-3.html">Home Auto Repair</a>
</li>
<li>
<a href="home-4.html">Home Classified Listing</a>
</li>
<li>
<a href="home-5.html">Home Multi Listing</a>
</li>
<li>
<a href="home-6.html">Home Boat Dealership</a>
</li>
</ul>
</li>
<li>
<a href="about.html">About Us</a>
</li>
<li class="menu-item-has-children">
<a href="#">Services</a>
<ul class="sub-menu">
<li>
<a href="service.html">Service</a>
</li>
<li>
<a href="service-details.html">Service Details</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Dealership</a>
<ul class="sub-menu">
<li>
<a href="dealership-grid.html">Dealership Grid</a>
</li>
<li>
<a href="dealership-list.html">Dealership List</a>
</li>
<li>
<a href="dealership-details.html">Dealership Details</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Inventory</a>
<ul class="sub-menu">
<li>
<a href="{{ route('inventory.grid') }}">Inventory Grid</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Inventory Listing</a>
</li>
<li>
<a href="inventory-left-sidebar.html">Inventory Left Sidebar</a>
</li>
<li>
<a href="inventory-right-sidebar.html">Inventory Right Sidebar</a>
</li>
<li>
<a href="{{ route('inventory.sold') }}">Sold Inventory</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Single Inventory</a>
</li>
<li>
<a href="{{ route('finance.calculator') }}">Finance Calculator</a>
</li>
<li>
<a href="{{ route('sell.car') }}">Sell a Car</a>
</li>
<li>
<a href="inventory-comparison.html">Inventory Comparison</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Pages</a>
<ul class="sub-menu">
<li class="menu-item-has-children">
<a href="#">Shop</a>
<ul class="sub-menu">
<li>
<a href="shop.html">Shop</a>
</li>
<li>
<a href="shop-details.html">Shop Details</a>
</li>
<li>
<a href="cart.html">Cart Page</a>
</li>
<li>
<a href="checkout.html">Checkout</a>
</li>
<li>
<a href="wishlist.html">Wishlist</a>
</li>
</ul>
</li>
<li>
<a href="team.html">Our Team</a>
</li>
<li>
<a href="team-details.html">Team Details</a>
</li>
<li>
<a href="pricing.html">Pricing Plan</a>
</li>
<li>
<a href="testimonials.html">Testimonials</a>
</li>
<li>
<a href="faq.html">Faq Page</a>
</li>
<li>
<a href="error.html">Error Page</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Blog</a>
<ul class="sub-menu">
<li>
<a href="blog.html">Blog</a>
</li>
<li>
<a href="blog-details.html">Blog Details</a>
</li>
</ul>
</li>
<li>
<a href="contact.html">Contact Us</a>
</li>
</ul>
</div>
</div>
</div>
<header class="th-header header-default">
<div class="header-top">
<div class="th-container">
<div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
<div class="col-auto d-none d-lg-block">
<div class="header-links">
<ul>
<li>
<i class="fal fa-location-dot">
</i> <a href="{{ config('dealership.contact.map_url') }}">{{ config('dealership.contact.address') }}, {{ config('dealership.contact.city') }}</a>
</li>
<li>
<i class="fa-regular fa-phone">
</i> <a href="tel:{{ config('dealership.contact.phone_formatted') }}">{{ config('dealership.contact.phone') }}</a>
</li>
<li>
<i class="fa-sharp fa-regular fa-envelope">
</i> <a href="mailto:{{ config('dealership.contact.email') }}">{{ config('dealership.contact.email') }}</a>
</li>
</ul>
</div>
</div>
<div class="col-auto">
<div class="header-links">
<ul>
<li class="d-none d-md-inline-block lang-wrapper">
<div class="dropdown-link">
<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
<i class="fa-regular fa-globe">
</i> English</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1" style="margin: 0px;">
<li>
<a href="#">English</a> <a href="#">German</a> <a href="#">French</a> <a href="#">Italian</a> <a href="#">Latvian</a>
</li>
</ul>
</div>
</li>
<li>
<div class="social-links">
<a href="https://www.facebook.com/">
<i class="fab fa-facebook-f">
</i>
</a> <a href="https://www.twitter.com/">
<i class="fab fa-twitter">
</i>
</a> <a href="https://www.instagram.com/">
<i class="fab fa-instagram">
</i>
</a> <a href="https://www.behance.com/">
<i class="fa-brands fa-behance">
</i>
</a>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="sticky-wrapper">
<div class="menu-area">
<div class="th-container">
<div class="row align-items-center justify-content-between">
<div class="col-auto">
<div class="header-logo">
<a href="{{ url('/') }}">
<img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports">
</a>
</div>
</div>
<div class="col-auto">
<nav class="main-menu sapace-left d-none d-lg-inline-block">
<ul>
<li class="menu-item-has-children active">
<a href="{{ url('/') }}">Home</a>
<ul class="sub-menu">
<li>
<a href="{{ url('/') }}">Home Car Dealership</a>
</li>
<li>
<a href="home-2.html">Home Bike Dealership</a>
</li>
<li>
<a href="home-3.html">Home Auto Repair</a>
</li>
<li>
<a href="home-4.html">Home Classified Listing</a>
</li>
<li>
<a href="home-5.html">Home Multi Listing</a>
</li>
<li>
<a href="home-6.html">Home Boat Dealership</a>
</li>
</ul>
</li>
<li>
<a href="about.html">About Us</a>
</li>
<li class="menu-item-has-children">
<a href="#">Services</a>
<ul class="sub-menu">
<li>
<a href="service.html">Service</a>
</li>
<li>
<a href="service-details.html">Service Details</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Dealership</a>
<ul class="sub-menu">
<li>
<a href="dealership-grid.html">Dealership Grid</a>
</li>
<li>
<a href="dealership-list.html">Dealership List</a>
</li>
<li>
<a href="dealership-details.html">Dealership Details</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Inventory</a>
<ul class="sub-menu">
<li>
<a href="{{ route('inventory.grid') }}">Inventory Grid</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Inventory Listing</a>
</li>
<li>
<a href="inventory-left-sidebar.html">Inventory Left Sidebar</a>
</li>
<li>
<a href="inventory-right-sidebar.html">Inventory Right Sidebar</a>
</li>
<li>
<a href="{{ route('inventory.sold') }}">Sold Inventory</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Single Inventory</a>
</li>
<li>
<a href="{{ route('finance.calculator') }}">Finance Calculator</a>
</li>
<li>
<a href="{{ route('sell.car') }}">Sell a Car</a>
</li>
<li>
<a href="inventory-comparison.html">Inventory Comparison</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Pages</a>
<ul class="sub-menu">
<li class="menu-item-has-children">
<a href="#">Shop</a>
<ul class="sub-menu">
<li>
<a href="shop.html">Shop</a>
</li>
<li>
<a href="shop-details.html">Shop Details</a>
</li>
<li>
<a href="cart.html">Cart Page</a>
</li>
<li>
<a href="checkout.html">Checkout</a>
</li>
<li>
<a href="wishlist.html">Wishlist</a>
</li>
</ul>
</li>
<li>
<a href="team.html">Our Team</a>
</li>
<li>
<a href="team-details.html">Team Details</a>
</li>
<li>
<a href="pricing.html">Pricing Plan</a>
</li>
<li>
<a href="testimonials.html">Testimonials</a>
</li>
<li>
<a href="faq.html">Faq Page</a>
</li>
<li>
<a href="error.html">Error Page</a>
</li>
</ul>
</li>
<li class="menu-item-has-children">
<a href="#">Blog</a>
<ul class="sub-menu">
<li>
<a href="blog.html">Blog</a>
</li>
<li>
<a href="blog-details.html">Blog Details</a>
</li>
</ul>
</li>
<li>
<a href="contact.html">Contact Us</a>
</li>
</ul>
</nav>
<button type="button" class="th-menu-toggle d-block d-lg-none">
<i class="far fa-bars">
</i>
</button>
</div>
<div class="col-auto d-none d-xl-block">
<div class="header-button">
<button type="button" class="simple-icon searchBoxToggler">
<i class="far fa-search">
</i>
</button> <button type="button" class="simple-icon sideMenuToggler">
<i class="fa-sharp fa-regular fa-bag-shopping">
</i> <span class="badge">5</span>
</button> <a href="{{ route('sell.car') }}" class="th-btn">Adding List <i class="fa-solid fa-circle-plus">
</i>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
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
<footer class="footer-wrapper footer-default bg-footer-color">
<div class="shape-mockup d-none d-xxl-block" data-top="0" data-left="0">
<img src="{{ asset('assets/img/shape/footer-1-top-shape.png') }}" alt="shape">
</div>
<div class="footer-top">
<div class="container">
<div class="footer-top-border">
<div class="row gy-4 justify-content-between">
<div class="col-lg-3">
<div class="logo-top">
<a href="{{ url('/') }}">
<img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports">
</a>
</div>
</div>
<div class="col-lg-9">
<div class="payment-wrap">
<div class="info">
<h4 class="text-white">Our Payment Methods</h4>
<h6>Our Easy And simple payment methods with cards</h6>
</div>
<div class="card-thumb-card">
<img src="{{ asset('assets/img/shape/cards.png') }}" alt="card-img">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="widget-area">
<div class="container">
<div class="row justify-content-between">
<div class="col-md-6 col-xl-3">
<div class="widget footer-widget">
<h3 class="widget_title">About Company</h3>
<div class="th-widget-about">
<p class="about-text">Dealerships allow customers to take vehicles for test drives to experience how the car feels before making a purchase.</p>
<div class="footer-call-wrap">
<div class="info-box">
<div class="info-contnt">
<h4 class="footer-info-title">Call Us:</h4>
<p class="info-box_text">
<a href="tel:{{ config('dealership.contact.phone_formatted') }}" class="info-box_link">{{ config('dealership.contact.phone') }}</a>
</p>
</div>
</div>
<div class="info-box">
<div class="info-contnt">
<h4 class="footer-info-title">Email Us:</h4>
<p class="info-box_text">
<a href="mailto:{{ config('dealership.contact.email') }}" class="info-box_link">{{ config('dealership.contact.email') }}</a>
</p>
</div>
</div>
</div>
<div class="th-social">
<a href="https://www.facebook.com/">
<i class="fab fa-facebook-f">
</i>
</a> <a href="https://www.twitter.com/">
<i class="fab fa-twitter">
</i>
</a> <a href="https://www.linkedin.com/">
<i class="fab fa-linkedin-in">
</i>
</a> <a href="{{ config('dealership.contact.whatsapp_url') }}">
<i class="fab fa-whatsapp">
</i>
</a>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget widget_nav_menu footer-widget">
<h3 class="widget_title">Pages</h3>
<div class="menu-all-pages-container">
<ul class="menu">
<li>
<a href="about.html">About Us</a>
</li>
<li>
<a href="blog.html">Our Blog</a>
</li>
<li>
<a href="team.html">Our Services</a>
</li>
<li>
<a href="service.html">Our Services</a>
</li>
<li>
<a href="shop.html">Shop</a>
</li>
<li>
<a href="contact.html">Contact Us</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget widget_nav_menu footer-widget">
<h3 class="widget_title">Vehicles List</h3>
<div class="menu-all-pages-container">
<ul class="menu">
<li>
<a href="{{ route('inventory.index') }}">Sedan</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Hatchback</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">SUV</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Hybrid</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Convertible</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Coupe</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget widget_nav_menu footer-widget">
<h3 class="widget_title">Our Brand</h3>
<div class="menu-all-pages-container">
<ul class="menu">
<li>
<a href="{{ route('inventory.index') }}">Toyota</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Audi</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">BMW</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Ferrari</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Nissan</a>
</li>
<li>
<a href="{{ route('inventory.index') }}">Ford</a>
</li>
</ul>
</div>
</div>
</div>
<div class="col-md-6 col-xl-auto">
<div class="widget footer-widget">
<h3 class="widget_title">Recent Posts</h3>
<div class="recent-post-wrap">
<div class="recent-post">
<div class="media-img">
<a href="blog-details.html">
<img src="{{ asset('assets/img/blog/recent-post-1-1.jpg') }}" alt="Blog Image">
</a>
</div>
<div class="media-body">
<div class="recent-post-meta">
<a href="blog.html">
<i class="fa-solid fa-calendar-days">
</i> 10 Dec, 2025</a>
</div>
<h4 class="post-title">
<a class="text-inherit" href="blog-details.html">The Ever-Evolving Land cape of</a>
</h4>
</div>
</div>
<div class="recent-post">
<div class="media-img">
<a href="blog-details.html">
<img src="{{ asset('assets/img/blog/recent-post-1-2.jpg') }}" alt="Blog Image">
</a>
</div>
<div class="media-body">
<div class="recent-post-meta">
<a href="blog.html">
<i class="fa-solid fa-calendar-days">
</i> 10 Dec, 2025</a>
</div>
<h4 class="post-title">
<a class="text-inherit" href="blog-details.html">The Ever-Evolving Land cape of</a>
</h4>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="copyright-wrap">
<div class="container">
<div class="row gy-2 align-items-center">
<div class="col-md-12">
<p class="copyright-text text-center">Copyright <i class="fal fa-copyright">
</i> 2025 <a href="{{ url('/') }}">Konastone Autos and Imports</a>. All Rights Reserved.</p>
</div>
</div>
</div>
</div>
</footer>
<div class="scroll-top">
<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
</path>
</svg>
</div>
<script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}">
</script>
<script src="{{ asset('assets/js/app.min.js') }}">
</script>
<script src="{{ asset('assets/js/main.js') }}">
</script>
</body>
<!-- Mirrored from html.themehour.net/kars/demo/inventory-sold.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2026 10:16:18 GMT -->
</html>
