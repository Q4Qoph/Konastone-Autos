<footer class="footer-wrapper footer-default bg-footer-color">
        <div class="shape-mockup d-none d-xxl-block" data-top="0" data-left="0"><img src="{{ asset('assets/img/shape/footer-1-top-shape.png') }}" alt="shape"></div>
        {{-- Temporarily hidden to preview the footer without payment methods.
        <div class="footer-top">
            <div class="container">
                <div class="footer-top-border">
                    <div class="row gy-4 justify-content-between">
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
        --}}
        <div class="widget-area">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-12 col-lg-6">
                        <div class="widget footer-widget">
                            <div class="footer-contact-logo"><a href="{{ route('home') }}"><img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports"></a></div>
                            <h3 class="widget_title">Contact Information</h3>
                            <div class="th-widget-about">
                                <div class="footer-call-wrap footer-contact-wrap flex-wrap">
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
                                <div class="th-social">
                                    <a href="https://www.facebook.com/share/18GxFiwdBg/" target="_blank" rel="noopener noreferrer" aria-label="Visit Konastone on Facebook"><img class="social-icon" src="{{ asset('assets/img/icon/facebook.svg') }}" alt=""></a>
                                    <a href="https://www.instagram.com/konastone_autos" target="_blank" rel="noopener noreferrer" aria-label="Visit Konastone on Instagram"><img class="social-icon" src="{{ asset('assets/img/icon/instagram.svg') }}" alt=""></a>
                                    <a href="{{ config('dealership.contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with Konastone on WhatsApp"><img class="social-icon" src="{{ asset('assets/img/icon/whatsapp.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Pages</h3>
                            <div class="menu-all-pages-container">
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="menu">
                                            <li><a href="{{ route('about') }}">About Us</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('inventory.index') }}">All Vehicle Inventory</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="menu">
                                            <li><a href="{{ route('inventory.sold') }}">Sold Vehicles</a></li>
                                            <li><a href="{{ route('finance.calculator') }}">Finance</a></li>
                                            <li><a href="{{ route('sell.car') }}">Sell a Car</a></li>
                                        </ul>
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
