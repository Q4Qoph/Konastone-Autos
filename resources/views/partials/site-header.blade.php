<div class="slider-drag-cursor">&lt;DRAG&gt;</div>
    <div class="preloader"><button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div id="load" role="status" aria-label="Loading">
                <div aria-hidden="true">G</div>
                <div aria-hidden="true">N</div>
                <div aria-hidden="true">I</div>
                <div aria-hidden="true">D</div>
                <div aria-hidden="true">A</div>
                <div aria-hidden="true">O</div>
                <div aria-hidden="true">L</div>
            </div>
        </div>
    </div>
    <div class="sidemenu-wrapper sidemenu-cart d-none d-lg-block">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget">
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img src="{{ asset('assets/img/product/product_1_1.png') }}" alt="Cart Image">Bosco Apple Fruit</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>940.00</span></span></li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img src="{{ asset('assets/img/product/product_1_2.png') }}" alt="Cart Image">Green Cauliflower</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>899.00</span></span></li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img src="{{ asset('assets/img/product/product_1_3.png') }}" alt="Cart Image">Mandarin orange</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>756.00</span></span></li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img src="{{ asset('assets/img/product/product_1_4.png') }}" alt="Cart Image">Shallot Red onion</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>723.00</span></span></li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#" class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img src="{{ asset('assets/img/product/product_1_5.png') }}" alt="Cart Image">Sour Red Cherry</a> <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>1080.00</span></span></li>
                    </ul>
                    <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>4398.00</span></p>
                    <p class="woocommerce-mini-cart__buttons buttons"><a href="cart.html" class="th-btn wc-forward">View cart</a> <a href="checkout.html" class="th-btn checkout wc-forward">Checkout</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block"><button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="{{ route('inventory.index') }}" method="GET" role="search"><input type="search" name="q" value="{{ request('q') }}" placeholder="Search make, model, year, or stock number" aria-label="Search vehicles"> <button type="submit" aria-label="Submit vehicle search"><i class="fal fa-search"></i></button></form>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="/"><img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports"></a></div>
            <div class="th-mobile-menu">
                @include('partials.main-navigation')
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
                                <li><i class="fal fa-location-dot"></i> <a href="{{ config('dealership.contact.map_url') }}" target="_blank" rel="noopener noreferrer">{{ config('dealership.contact.address') }}, {{ config('dealership.contact.city') }}</a></li>
                                <li><i class="fa-regular fa-phone"></i> <a href="tel:{{ config('dealership.contact.phone_formatted') }}">{{ config('dealership.contact.phone') }}</a></li>
                                <li><i class="fa-sharp fa-regular fa-envelope"></i> <a href="mailto:{{ config('dealership.contact.email') }}">{{ config('dealership.contact.email') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-links">
                            <ul>
                                <li>
                                    <div class="social-links">
                                        <a href="https://www.facebook.com/share/18GxFiwdBg/" target="_blank" rel="noopener noreferrer" aria-label="Visit Konastone on Facebook"><img class="social-icon" src="{{ asset('assets/img/icon/facebook.svg') }}" alt=""></a>
                                        <a href="https://www.instagram.com/konastone_autos" target="_blank" rel="noopener noreferrer" aria-label="Visit Konastone on Instagram"><img class="social-icon" src="{{ asset('assets/img/icon/instagram.svg') }}" alt=""></a>
                                        <a href="{{ config('dealership.contact.whatsapp_url') }}" target="_blank" rel="noopener noreferrer" aria-label="Chat with Konastone on WhatsApp"><img class="social-icon" src="{{ asset('assets/img/icon/whatsapp.svg') }}" alt=""></a>
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
                            <div class="header-logo"><a href="/"><img src="{{ asset('assets/img/konastone-logo.svg') }}" alt="Konastone Autos and Imports"></a></div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu sapace-left d-none d-lg-inline-block">
                                @include('partials.main-navigation')
                            </nav><button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button"><button type="button" class="simple-icon searchBoxToggler"><i class="far fa-search"></i></button> <button type="button" class="simple-icon sideMenuToggler"><i class="fa-sharp fa-regular fa-bag-shopping"></i> <span class="badge">5</span></button> <a href="{{ route('sell.car') }}" class="th-btn">Sell a Car <i class="fa-solid fa-circle-plus"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
