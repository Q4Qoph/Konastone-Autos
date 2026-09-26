<ul>
    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
    <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About Us</a></li>
    <li class="menu-item-has-children {{ request()->routeIs('inventory.*') || request()->routeIs('finance.calculator') || request()->routeIs('sell.car') ? 'active' : '' }}">
        <a href="{{ route('inventory.index') }}">Listing</a>
        <ul class="sub-menu">
            <li><a href="{{ route('inventory.index') }}">All Vehicles</a></li>
            <li><a href="{{ route('inventory.grid') }}">Grid View</a></li>
            <li><a href="{{ route('inventory.sold') }}">Sold Vehicles</a></li>
            <li><a href="{{ route('finance.calculator') }}">Finance Calculator</a></li>
            <li><a href="{{ route('sell.car') }}">Sell a Car</a></li>
            @if (Route::has('inventory.compare'))
                <li><a href="{{ route('inventory.compare') }}">Compare Vehicles</a></li>
            @endif
            {{-- TODO: Add saved vehicles after favorites and its route are implemented.
            <li><a href="#">Saved Vehicles</a></li>
            --}}
        </ul>
    </li>
    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Contact Us</a></li>
    @if (Route::has('inventory.index') || Route::has('contact'))
        <li class="menu-item-has-children {{ request()->routeIs('inventory.*', 'contact') ? 'active' : '' }}">
            <a href="{{ route(Route::has('inventory.index') ? 'inventory.index' : 'contact') }}">Services</a>
            <ul class="sub-menu">
                @if (Route::has('inventory.index'))
                    <li><a href="{{ route('inventory.index') }}">Vehicle Sourcing</a></li>
                @endif
                @if (Route::has('contact'))
                    <li><a href="{{ route('contact') }}">Inspection and Delivery</a></li>
                @endif
            </ul>
        </li>
    @endif
    @if (filled(config('dealership.contact.city')) && filled(config('dealership.contact.map_url')))
        <li class="menu-item-has-children">
            <a href="{{ config('dealership.contact.map_url') }}" target="_blank" rel="noopener noreferrer">Dealership Locations</a>
            <ul class="sub-menu">
                <li><a href="{{ config('dealership.contact.map_url') }}" target="_blank" rel="noopener noreferrer">{{ config('dealership.contact.city') }}</a></li>
            </ul>
        </li>
    @endif
{{-- TODO: Add Blog, Testimonials, and FAQ links after those sections are implemented.
<li><a href="#">Blog</a></li>
<li><a href="#">Testimonials</a></li>
<li><a href="#">FAQs</a></li>
--}}
</ul>
