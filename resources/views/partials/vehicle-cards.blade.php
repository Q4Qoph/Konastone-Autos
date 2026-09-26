@foreach ($vehicles as $vehicle)
    @php
        $image = $vehicle->coverImage ?? $vehicle->images->first();
        $imageUrl = $image?->url('card') ?? asset('assets/img/featured/featured-1-1.jpg');
        $column = $viewMode === 'list' ? 'col-12' : 'col-xl-3 col-lg-4 col-sm-6';
    @endphp
    <div class="{{ $column }}">
        <a class="feature-list-1 vehicle-card-link {{ $viewMode === 'list' ? 'list' : '' }}" href="{{ route('inventory.show', ['vehicle' => $vehicle->slug]) }}">
            <div class="box-icon">
                <img src="{{ $imageUrl }}" alt="{{ $vehicle->year }} {{ $vehicle->brand->name }} {{ $vehicle->model }}" loading="lazy">
                <div class="actions">
                    <span class="icon-btn" aria-label="{{ ucfirst(str_replace('_', ' ', $vehicle->condition)) }}"><i class="fa-regular fa-tag"></i></span>
                </div>
            </div>
            <div class="car-content">
                <div class="media-body">
                    <h3 class="box-title">{{ $vehicle->brand->name }} {{ $vehicle->model }}</h3>
                </div>
                <div class="vehicle-card-price-row"><h6 class="box-title">KSh {{ number_format((float) $vehicle->price, 0) }}</h6></div>
                <ul class="car-feature">
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-date-1-1.svg') }}" alt=""></div>{{ $vehicle->year }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt=""></div>{{ $vehicle->engine_capacity ? number_format($vehicle->engine_capacity).' cc' : 'Not listed' }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt=""></div>{{ $vehicle->transmission ? ucfirst($vehicle->transmission) : 'Not listed' }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt=""></div>{{ $vehicle->fuel_type ? ucfirst($vehicle->fuel_type) : 'Not listed' }}</li>
                </ul>
            </div>
        </a>
    </div>
@endforeach
