@foreach ($relatedVehicles as $relatedVehicle)
    @php
        $image = $relatedVehicle->coverImage ?? $relatedVehicle->images->first();
        $imageUrl = $image?->url('card') ?? asset('assets/img/featured/featured-1-1.jpg');
    @endphp
    <div class="swiper-slide">
        <a class="feature-list-1 vehicle-card-link" href="{{ route('inventory.show', ['vehicle' => $relatedVehicle->slug]) }}">
            <div class="box-icon">
                <img src="{{ $imageUrl }}" alt="{{ $relatedVehicle->year }} {{ $relatedVehicle->brand->name }} {{ $relatedVehicle->model }}" loading="lazy">
                <div class="actions"><span class="icon-btn" aria-label="{{ ucfirst(str_replace('_', ' ', $relatedVehicle->condition)) }}"><i class="fa-regular fa-tag"></i></span></div>
            </div>
            <div class="car-content">
                <div class="media-body">
                    <h3 class="box-title">{{ $relatedVehicle->brand->name }} {{ $relatedVehicle->model }}</h3>
                </div>
                <div class="vehicle-card-price-row"><h6 class="box-title">KSh {{ number_format((float) $relatedVehicle->price, 0) }}</h6></div>
                <ul class="car-feature">
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-date-1-1.svg') }}" alt=""></div>{{ $relatedVehicle->year }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt=""></div>{{ $relatedVehicle->engine_capacity ? number_format($relatedVehicle->engine_capacity).' cc' : 'Not listed' }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt=""></div>{{ $relatedVehicle->transmission ? ucfirst($relatedVehicle->transmission) : 'Not listed' }}</li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt=""></div>{{ $relatedVehicle->fuel_type ? ucfirst($relatedVehicle->fuel_type) : 'Not listed' }}</li>
                </ul>
            </div>
        </a>
    </div>
@endforeach
