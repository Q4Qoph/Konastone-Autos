<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from html.themehour.net/kars/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2026 10:08:24 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Konastone Autos and Imports')</title>
    <meta name="description" content="@yield('meta_description', 'Premium handcrafted doors for luxury spaces.')">
    <link rel="canonical" href="@yield('canonical', url()->current())">
    <meta property="og:title" content="@yield('og_title', 'Konastone Autos and Imports')">
    <meta property="og:description" content="@yield('og_description', 'Premium handcrafted doors for luxury spaces.')">
    <meta property="og:image" content="@yield('og_image', asset('assets/img/konastone-logo.svg'))">
    <meta name="author" content="Konastone Autos and Imports">
    <meta name="keywords" content="Konastone Autos and Imports, premium cars, car dealership">
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

<body class="@yield('body-class')">
    @include('partials.site-header')
    @yield('hero')
    @yield('page-sections')
    @if (request()->routeIs('home'))
    <div class="th-hero-wrapper hero-1" id="hero">
        <div class="th-hero-bg" data-bg-src="{{ asset('assets/img/bg/hero_bg_1_1.jpg') }}"></div>
        <div class="swiper th-slider" id="heroSlidee1" data-slider-options='{"effect":"fade", "autoplay":{"delay":7000,"disableOnInteraction":false}, "loop":true, "autoHeight": "true"}'>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-inner hero-style1">
                        <div class="container th-container">
                            <div class="row gy-50 gx-40 align-items-center">
                                <div class="col-xxl-5 col-xl-6 col-lg-6">
                                    <div class="hero-1-content"><span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><span class="text-theme">Mombasa, Kenya</span> · Konastone Autos &amp; Imports</span>
                                        <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Find quality cars for sale in Mombasa.</h1>
                                        <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">Browse available cars, compare prices, mileage and vehicle details, then contact our team to arrange a viewing.</p>
                                        <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.8s"><a href="{{ route('inventory.index') }}" class="th-btn style2">Browse Available Cars <i class="fas fa-arrow-up-right"></i></a> <a href="{{ route('contact') }}" class="th-btn style3 text-white">Contact Us <i class="fas fa-arrow-up-right"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-6 col-lg-6">
                                    <div class="hero-img text-end">
                                        <div class="img-main" data-ani="slideinright" data-ani-delay="0.8s"><img src="{{ asset('assets/img/hero/hero_1_1.png') }}" alt="Image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner hero-style1">
                        <div class="container th-container">
                            <div class="row gy-50 gx-40 align-items-center">
                                <div class="col-xxl-5 col-xl-6 col-lg-6">
                                    <div class="hero-1-content"><span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><span class="text-theme">Mombasa, Kenya</span> · Konastone Autos &amp; Imports</span>
                                        <h2 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Find quality cars for sale in Mombasa.</h2>
                                        <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">Browse available cars, compare prices, mileage and vehicle details, then contact our team to arrange a viewing.</p>
                                        <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.8s"><a href="{{ route('inventory.index') }}" class="th-btn style2">Browse Available Cars <i class="fas fa-arrow-up-right"></i></a> <a href="{{ route('contact') }}" class="th-btn style3 text-white">Contact Us <i class="fas fa-arrow-up-right"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-6 col-lg-6">
                                    <div class="hero-img text-end">
                                        <div class="img-main" data-ani="slideinright" data-ani-delay="0.8s"><img src="{{ asset('assets/img/hero/hero_1_2.png') }}" alt="Image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-inner hero-style1">
                        <div class="container th-container">
                            <div class="row gy-50 gx-40 align-items-center">
                                <div class="col-xxl-5 col-xl-6 col-lg-6">
                                    <div class="hero-1-content"><span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s"><span class="text-theme">Mombasa, Kenya</span> · Konastone Autos &amp; Imports</span>
                                        <h2 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s">Find quality cars for sale in Mombasa.</h2>
                                        <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">Browse available cars, compare prices, mileage and vehicle details, then contact our team to arrange a viewing.</p>
                                        <div class="btn-group justify-content-center" data-ani="slideinup" data-ani-delay="0.8s"><a href="{{ route('inventory.index') }}" class="th-btn style2">Browse Available Cars <i class="fas fa-arrow-up-right"></i></a> <a href="{{ route('contact') }}" class="th-btn style3 text-white">Contact Us <i class="fas fa-arrow-up-right"></i></a></div>
                                    </div>
                                </div>
                                <div class="col-xxl-7 col-xl-6 col-lg-6">
                                    <div class="hero-img text-end">
                                        <div class="img-main" data-ani="slideinright" data-ani-delay="0.8s"><img src="{{ asset('assets/img/hero/hero_1_3.png') }}" alt="Image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-pagination"></div>
            <div class="slider-pagination2"></div>
        </div>
    </div>
    <section class="feature-sec-1 space" data-bg-src="{{ asset('assets/img/bg/feature-sec-bg-1.png') }}">
        <div class="container">
            <div class="row justify-content-lg-between justify-content-center align-items-center">
                <div class="col-xxl-7 col-xl-9">
                    <div class="title-area text-center text-lg-start">
                        <h2 class="sec-title">Latest Featured Car Inventory</h2>
                        <p class="pe-lg-5 me-xl-5">Car dealerships typically feature showrooms where the latest models are displayed in a well-lit, aesthetically pleasing environment.</p>
                    </div>
                </div>
                <div class="col-auto mt-2">
                    <div class="sec-btn">
                        <ul class="nav nav-tabs custom" id="myTabContentF1h11" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active" id="featured-cars-tab" data-bs-toggle="tab" data-bs-target="#featured-cars" type="button" role="tab" aria-controls="featured-cars" aria-selected="true">Featured Cars</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="recent-cars-tab" data-bs-toggle="tab" data-bs-target="#recent-cars" type="button" role="tab" aria-controls="recent-cars" aria-selected="false">Recent Cars</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="popular-cars-tab" data-bs-toggle="tab" data-bs-target="#popular-cars" type="button" role="tab" aria-controls="popular-cars" aria-selected="false">Popular Cars</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContentF1h1">
                <div class="tab-pane fade show active" id="featured-cars" role="tabpanel" aria-labelledby="featured-cars-tab">
                    <div class="row gy-30">
                        @if (isset($featuredVehicles))
                            @include('partials.vehicle-cards', ['vehicles' => $featuredVehicles, 'viewMode' => 'grid'])
                            @if ($featuredVehicles->isEmpty())
                                <div class="col-12"><p class="text-center">Our featured inventory is being updated.</p></div>
                            @endif
                        @else
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-1.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                        <p class="box-text"><span>Listed by:</span> BMW X3 M40i</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$17,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-2.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Corolla LE</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Ford Explorer XLT</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$16,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-3.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Honda Civic Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Toyota Camry SE</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$18,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-4.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Nissan Altima SV</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Honda Accord LX</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$14,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-5.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi Q7 Premium</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Nissan Rogue SV</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$11,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-6.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Kia Sorento LX</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Audi A4 Quattro</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-7.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">JTesla Model Y</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Hyundai Santa Fe</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$27,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-8.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Mazda CX-5 Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Tesla Model 3</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="recent-cars" role="tabpanel" aria-labelledby="recent-cars-tab">
                    <div class="row gy-30 justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-8.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Genesis G80 Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Acura TLX Type</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$27,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-11.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">BMW X5 MY</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Infiniti Q50 Red</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-7.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Kia Sorento LX</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Lexus ES 350</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$23,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-10.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ram 1500 Rebel</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Cadillac XT5 Sport</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-9.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Mazda CX-5 Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> BMW X3 M40i</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$25,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-1.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">JTesla Model Y</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Tesla Model 3</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$26,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-3.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Ford Explorer XLT</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$29,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-12.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">GMC Yukon Denali</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Hyundai Santa Fe</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$17,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="popular-cars" role="tabpanel" aria-labelledby="popular-cars-tab">
                    <div class="row gy-30 justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-10.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">GMC Yukon Denali</a></h3>
                                        <p class="box-text"><span>Listed by:</span> BMW X3 M40i</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-1.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Ford Explorer XLT</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$18,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-9.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">BMW X5 MY</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Tesla Model 3</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$27,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-12.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Corolla LE</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Honda Accord LX</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$23,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-3.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Genesis G80 Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Hyundai Santa Fe</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$16,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-6.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ram 1500 Rebel</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Acura TLX Type</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$11,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-2.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Kia Sorento LX</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Lexus ES 350</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="feature-list-1">
                                <div class="box-icon"><img src="{{ asset('assets/img/featured/featured-1-7.jpg') }}" alt="image">
                                    <div class="actions"><a href="#" class="icon-btn"><i class="fa-regular fa-tag"></i></a> <a href="#" class="icon-btn"><i class="far fa-heart"></i></a></div>
                                </div>
                                <div class="car-content">
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Honda Civic Sport</a></h3>
                                        <p class="box-text"><span>Listed by:</span> Infiniti Q50 Red</p>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom">
                                        <h6 class="box-title">$14,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-5 text-center"><a href="{{ route('inventory.index') }}" class="th-btn bg-black">View All Listing <i class="fas fa-arrow-up-right"></i></a></div>
        </div>
    </section>
    <div class="brand-area-1 space overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title-area text-start">
                        <h2 class="sec-title">Explore By Brands</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="swiper th-slider" id="brand-slider-1" data-slider-options='{"loop":true,"speed":500,"autoplay":{"delay":1800,"disableOnInteraction":false},"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
                        <div class="swiper-wrapper">
                            @foreach ($exploreBrands as $brand)
                                <div class="swiper-slide">
                                    <div class="brand-box">
                                        <a href="{{ route('inventory.index', ['brand' => $brand['slug']]) }}" aria-label="Explore {{ $brand['name'] }} vehicles">
                                            <img src="{{ asset('assets/img/brand/'.$brand['image']) }}" alt="{{ $brand['name'] }}" loading="lazy">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TODO: Revisit and re-enable the Best Reasonable Price Cars section after its vehicle content and layout are updated.
    <section class="best-price-car-sec-1 space-top overflow-hidden">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-7">
                    <div class="title-area text-center">
                        <h2 class="sec-title">our Best reasonable Price car</h2>
                        <p>Car dealerships typically feature showrooms where the latest models are displayed in a well-lit, aesthetically pleasing environment.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="slider-area best-price-car-gallery-slider">
                <div class="swiper th-slider bestPriceContentSlide" data-slider-options='{"centeredSlides":true,"autoHeight":"true","spaceBetween":60,"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"allowTouchMove": false, "simulateTouch": false}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-1.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-2.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-3.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-4.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-5.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-6.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-4.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-5.png') }}" alt="image"></div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="best-price-car-gallery-1">
                                <div class="best-price-car-box"><img src="{{ asset('assets/img/best-price-car/best-price-car-1-6.png') }}" alt="image"></div>
                            </div>
                        </div>
                    </div><button data-slider-prev="#bestPriceCarContent" class="slider-arrow slider-prev best-price-arrow"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#bestPriceCarContent" class="slider-arrow slider-next best-price-arrow"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container th-container3">
            <div class="slider-area best-price-car-content-slider-area">
                <div class="swiper th-slider" id="bestPriceCarContent" data-slider-options='{"centeredSlides":true,"autoHeight":"true","spaceBetween":10,"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"thumbs":{"swiper":".bestPriceContentSlide"},"allowTouchMove": false, "simulateTouch": false}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$156,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Range Rover - ZF 2016</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$146,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ferrari - GZ 2033</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$136,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Camry SE</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$166,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi A4 Quattro</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$186,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Hyundai Santa Fe</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$196,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">BMW X3 M40i</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$172,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi A4 Quattro</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$193,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">Hyundai Santa Fe</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="feature-list-1 best-price-car-content">
                                <div class="car-content">
                                    <h6 class="box-title-price">$182,000.00</h6>
                                    <div class="media-body">
                                        <h3 class="box-title"><a href="{{ route('inventory.index') }}">BMW X3 M40i</a></h3>
                                    </div>
                                    <ul class="car-feature">
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                        </li>
                                    </ul>
                                    <div class="car-bottom justify-content-center"><a class="link-btn" href="{{ route('inventory.index') }}">Select Your Car <i class="fas fa-arrow-up-right"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    End of the temporarily disabled Best Reasonable Price Cars section. --}}
    <div class="service-offer-sec-1 space">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="service-offer-wrapper mega-hover" data-bg-src="{{ asset('assets/img/cta/cta-img-1-1.jpg') }}">
                        <div class="service-offer-box">
                            <h3 class="box-title">Do You Want to Sell a Car ?</h3>
                            <p class="box-text">Understand the customer’s needs, budget, and preferences.</p><a href="dealership-list.html" class="th-btn sm style2 bg-theme-3 text-title">Get Started<i class="fas fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-offer-wrapper mega-hover" data-bg-src="{{ asset('assets/img/cta/cta-img-1-2.jpg') }}">
                        <div class="service-offer-box">
                            <h3 class="box-title">Need to Sell Your Car Fast?</h3>
                            <p class="box-text">Understand what the customer wants can afford and prefers</p><a href="dealership-list.html" class="th-btn sm style2">Get Started <i class="fas fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space overflow-hidden" data-bg-src="{{ asset('assets/img/bg/contact-bg-1.jpg') }}">
        <div class="container">
            <div class="row gx-60 gy-40">
                <div class="col-lg-7 col-xl-7">
                    <div class="contact-form-v1-wrap mb-4">
                        <div class="title-area mb-35">
                            <h4 class="sec-title mb-0">Car Loan Calculator</h4>
                            <p class="box-text">Estimate your monthly auto loan payments with this calculator.</p>
                        </div>
                        <form action="https://html.themehour.net/kars/demo/mail.php" method="POST" class="quote-form ajax-contact">
                            <div class="row">
                                <div class="form-group col-md-6"><label for="Priceofvehicles">Price of vehicles</label> <input type="text" class="form-control" name="name" id="Priceofvehicles" placeholder="$20000"></div>
                                <div class="form-group col-md-6"><label for="Interest_Rate">Interest Rate</label> <input type="email" class="form-control" name="rate" id="Interest_Rate" placeholder="10%"></div>
                                <div class="form-group col-md-6"><label for="Terms">Terms</label> <input type="email" class="form-control" name="rate" id="Terms" placeholder="10%"></div>
                                <div class="form-group col-md-6"><label for="Down_payment">Down payment</label> <input type="email" class="form-control" name="rate" id="Down_payment" placeholder="Down payment"></div>
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
                                <div class="form-btn col-12"><button class="th-btn bg-black w-100">Apply for loan <i class="fas fa-arrow-up-right"></i></button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                    <div class="contact-form__latest-info bg-theme">
                        <div class="thumb"><img src="{{ asset('assets/img/icon/client-img.png') }}" alt="images"></div>
                        <div class="content">
                            <h6>2345 people used Konastone Autos in the last 24 hours</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-5">
                    <div class="contact-box-1-right">
                        <div class="title-area">
                            <h2 class="sec-title text-white">Want to Calculate Your Car Payment?</h2>
                            <p>Most dealerships offer trade-in programs where customers can bring their old vehicle, which is appraised, and the value is credited towards the purchase of new or used car.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="testi-card-area-1 space bg-smoke overflow-hidden" id="testi-sec">
        <div class="shape-mockup" data-right="0" data-top="0"><img src="{{ asset('assets/img/shape/testi-irhgt-shpae-bg.png') }}" alt="shape-bg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-7">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Our Customer Feedback!</h2>
                        {{-- TODO: Replace this placeholder intro when real customer feedback is ready. <p>Many dealerships have service departments equipped with certified technicians who handle maintenance, repairs, oil changes, tire rotations, and other essential vehicle services.</p> --}}
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="testi-card-slide">
                    <div class="swiper has-shadow th-slider" id="testiSlide1" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_1.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Good Price Care</h3>
                                            <p class="box-text">“Many dealerships offer extended warranties, service contracts, and protection plans that cover.”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_2.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Good Service Care</h3>
                                            <p class="box-text">“Dealerships offer protection plans, maintenance services, and to keep vehicles running smoothly.”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_3.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Trusted Value Care</h3>
                                            <p class="box-text">“Extended service contracts, warranty options, and repair coverage available many.”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_1.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Excellent Deal Care</h3>
                                            <p class="box-text">“Customers can benefit from extended warranties contracts, protection plans at dealer..”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_2.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Luxury Ride Care</h3>
                                            <p class="box-text">“Comprehensive protection plans, scheduled maintenance warranties are available at dealer.”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testi-block" dir="ltr">
                                    {{-- TODO: Restore this card's testimonial content after verified customer feedback is available.
                                    <div class="testi-block-top">
                                        <div class="box-img"><img src="{{ asset('assets/img/testimonial/testi_1_3.jpg') }}" alt="Avater"></div>
                                        <div class="content">
                                            <div class="box-review"><i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i> <i class="fa-sharp fa-solid fa-star"></i>
                                                <div class="rating"><span>4.0 / 5.0 Reviews</span></div>
                                            </div>
                                            <h3 class="box-title">Smart Budget Care</h3>
                                            <p class="box-text">“Many dealerships offer repair coverage, service and are the, and vehicle protection programs.”</p>
                                            <div class="content-bottom">
                                                <div class="left">
                                                    <h3 class="name-title">Parker Jimines</h3>
                                                    <p class="box-desig">Customer</p>
                                                </div>
                                                <div class="right"><img src="{{ asset('assets/img/icon/testi-quote-icon.png') }}" alt="image"></div>
                                            </div>
                                        </div>
                                    </div>
                                                                    --}}
                                    <img src="{{ asset('assets/img/coming-soon.png') }}" alt="Coming Soon" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="pagination-count-wrap border-style">
                            <div class="pagination-wrap">
                                <div class="slider-pagination"></div>
                            </div>
                            <div class="slider-pagination2"></div>
                        </div>
                    </div><button data-slider-prev="#testiSlide1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button> <button data-slider-next="#testiSlide1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-2-area mega-hover" data-bg-src="{{ asset('assets/img/bg/cta-bg-1-2.jpg') }}">
        <div class="container">
            <div class="cta-2-bg-wrapper">
                <div class="col-lg-5 col-md-7 col-sm-9">
                    <div class="cta-box1-2">
                        <div class="thumb"><img src="{{ asset('assets/img/icon/cta-1-2-shape.png') }}" alt="img">
                            <div class="cta-content-title">
                                <div class="title-area mb-10"><span class="box-title">BLACK</span>
                                    <h4 class="box-title style1">FRIDAY</h4>
                                    <h3 class="sec-title style1">70 <span class="percent">%</span> <span class="up-to">Up to<br>off</span></h3>
                                </div>
                            </div><a href="dealership-list.html" class="th-btn style2">Buy Now <i class="fas fa-arrow-up-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- TODO: Revisit and re-enable the Best Selling Cars section after its vehicle content and layout are updated.
    <section class="best-selling-sec-1 space overflow-hidden">
        <div class="shape-mockup" data-top="0" data-left="0"><img src="{{ asset('assets/img/shape/best-selling-left-icon.png') }}" alt="img"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-8">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Our Best Selling Cars</h2>
                        <p class="sec-text">Many dealerships have service departments equipped with certified technicians who handle maintenance, repairs, oil changes, tire rotations, and other essential vehicle services.</p>
                    </div>
                </div>
            </div>
            <div class="row gy-30 justify-content-center">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="best-selling-tab">
                        <ul class="nav nav-tabs custom" id="myTabBestSell" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link active" id="lamborghini-tab" data-bs-toggle="tab" data-bs-target="#lamborghini" type="button" role="tab" aria-controls="lamborghini" aria-selected="true"><span class="numb">1.</span> Lamborghini</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="RKD_Series-tab" data-bs-toggle="tab" data-bs-target="#RKD_Series" type="button" role="tab" aria-controls="RKD_Series" aria-selected="false"><span class="numb">2.</span> RKD Series</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="logichone-tab" data-bs-toggle="tab" data-bs-target="#logichone" type="button" role="tab" aria-controls="logichone" aria-selected="false"><span class="numb">3.</span> Logichone</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="La_Feraotin-tab" data-bs-toggle="tab" data-bs-target="#La_Feraotin" type="button" role="tab" aria-controls="La_Feraotin" aria-selected="false"><span class="numb">4.</span> La Feraotin</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="Royal_Trigger-tab" data-bs-toggle="tab" data-bs-target="#Royal_Trigger" type="button" role="tab" aria-controls="Royal_Trigger" aria-selected="false"><span class="numb">5.</span> Royal Trigger</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="Luis_Donsider-tab" data-bs-toggle="tab" data-bs-target="#Luis_Donsider" type="button" role="tab" aria-controls="Luis_Donsider" aria-selected="false"><span class="numb">6.</span> Luis Donsider</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="Dugavvi-tab" data-bs-toggle="tab" data-bs-target="#Dugavvi" type="button" role="tab" aria-controls="Dugavvi" aria-selected="false"><span class="numb">7.</span> Dugavvi</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="Land_Midder-tab" data-bs-toggle="tab" data-bs-target="#Land_Midder" type="button" role="tab" aria-controls="Land_Midder" aria-selected="false"><span class="numb">8.</span> Land Midder</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="Gentdy_M_Series-tab" data-bs-toggle="tab" data-bs-target="#Gentdy_M_Series" type="button" role="tab" aria-controls="Gentdy_M_Series" aria-selected="false"><span class="numb">9.</span> Gentdy M Series</button></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content" id="myTabContentBestCar1">
                        <div class="tab-pane fade show active" id="lamborghini" role="tabpanel" aria-labelledby="lamborghini-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Camry SE</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$17,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="RKD_Series" role="tabpanel" aria-labelledby="RKD_Series-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi A4 Quattro</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$16,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Nissan Rogue SV</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$20,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="logichone" role="tabpanel" aria-labelledby="logichone-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Acura TLX Type</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Hyundai Santa Fe</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$23,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="La_Feraotin" role="tabpanel" aria-labelledby="La_Feraotin-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi A4 Quattro</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$16,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Nissan Rogue SV</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$20,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Royal_Trigger" role="tabpanel" aria-labelledby="Royal_Trigger-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Acura TLX Type</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Hyundai Santa Fe</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$23,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Luis_Donsider" role="tabpanel" aria-labelledby="Luis_Donsider-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Camry SE</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$17,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Dugavvi" role="tabpanel" aria-labelledby="Dugavvi-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Audi A4 Quattro</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$16,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Nissan Rogue SV</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$20,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Land_Midder" role="tabpanel" aria-labelledby="Land_Midder-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Acura TLX Type</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$21,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Hyundai Santa Fe</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$23,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Gentdy_M_Series" role="tabpanel" aria-labelledby="Gentdy_M_Series-tab">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-1.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Toyota Camry SE</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$19,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="feature-list-1 best-selling">
                                        <div class="box-icon"><img src="{{ asset('assets/img/featured/best-selling-1-2.jpg') }}" alt="image">
                                            <div class="tag-list"><a href="shop.html"><i class="fa-regular fa-tag"></i></a></div>
                                        </div>
                                        <div class="car-content">
                                            <div class="media-body">
                                                <h3 class="box-title"><a href="{{ route('inventory.index') }}">Ford Explorer XLT</a></h3>
                                                <p class="box-desc">Engage in a detailed consultation to determine the type of vehicle the customer.</p>
                                                <p class="box-text"><span>Listed by:</span> Motor lane Automotive</p>
                                            </div>
                                            <ul class="car-feature">
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt="icon"></div>120cc
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt="icon"></div>Manual
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt="icon"></div>Petrol
                                                </li>
                                            </ul>
                                            <div class="car-bottom">
                                                <h6 class="box-title">$17,000</h6><a class="th-btn sm style3" href="{{ route('inventory.index') }}">View Details <i class="fas fa-arrow-up-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    End of the temporarily disabled Best Selling Cars section. --}}
    @endif
    @include('partials.site-footer')
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg></div>
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
<!-- Mirrored from html.themehour.net/kars/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2026 10:10:40 GMT -->

</html>
