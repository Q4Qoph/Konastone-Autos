<footer class="footer-wrapper footer-default bg-footer-color">
        <div class="shape-mockup d-none d-xxl-block" data-top="0" data-left="0"><img src="{{ asset('assets/img/shape/footer-1-top-shape.png') }}" alt="shape"></div>
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-border">
                    <div class="row gy-4 justify-content-between">
                        <div class="col-lg-3">
                            <div class="logo-top"><a href="/"><img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports"></a></div>
                        </div>
                        <div class="col-lg-9">
                            <div class="payment-wrap">
                                <div class="info">
                                    <h4 class="text-white">Our Payment Methods</h4>
                                    <h6>Our Easy And simple payment methods with cards</h6>
                                </div>
                                <div class="card-thumb-card"><img src="{{ asset('assets/img/shape/cards.png') }}" alt="card-img"></div>
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
                                            <p class="info-box_text"><a href="tel:{{ config('dealership.contact.phone_formatted') }}" class="info-box_link">{{ config('dealership.contact.phone') }}</a></p>
                                        </div>
                                    </div>
                                    <div class="info-box">
                                        <div class="info-contnt">
                                            <h4 class="footer-info-title">Email Us:</h4>
                                            <p class="info-box_text"><a href="mailto:{{ config('dealership.contact.email') }}" class="info-box_link">{{ config('dealership.contact.email') }}</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="th-social"><a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a> <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a> <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a> <a href="{{ config('dealership.contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Pages</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="blog.html">Our Blog</a></li>
                                    <li><a href="team.html">Our Services</a></li>
                                    <li><a href="service.html">Our Services</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Vehicles List</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="{{ route('inventory.index') }}">Sedan</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Hatchback</a></li>
                                    <li><a href="{{ route('inventory.index') }}">SUV</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Hybrid</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Convertible</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Coupe</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Our Brand</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    <li><a href="{{ route('inventory.index') }}">Toyota</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Audi</a></li>
                                    <li><a href="{{ route('inventory.index') }}">BMW</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Ferrari</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Nissan</a></li>
                                    <li><a href="{{ route('inventory.index') }}">Ford</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img src="{{ asset('assets/img/blog/recent-post-1-1.jpg') }}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <div class="recent-post-meta"><a href="blog.html"><i class="fa-solid fa-calendar-days"></i> 10 Dec, 2025</a></div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">The Ever-Evolving Land cape of</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-details.html"><img src="{{ asset('assets/img/blog/recent-post-1-2.jpg') }}" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        <div class="recent-post-meta"><a href="blog.html"><i class="fa-solid fa-calendar-days"></i> 10 Dec, 2025</a></div>
                                        <h4 class="post-title"><a class="text-inherit" href="blog-details.html">The Ever-Evolving Land cape of</a></h4>
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
                        <p class="copyright-text text-center">Copyright <i class="fal fa-copyright"></i> 2025 <a href="/">Konastone Autos and Imports</a>. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
