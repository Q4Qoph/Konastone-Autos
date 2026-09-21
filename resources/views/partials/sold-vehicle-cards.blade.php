@foreach ($vehicles as $vehicle)
    @php
        $image = $vehicle->coverImage ?? $vehicle->images->first();
        $imageUrl = $image?->url('card') ?? asset('assets/img/featured/featured-1-1.jpg');
    @endphp
    <div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-6">
        <div class="feature-list-1 sold">
            <div class="box-icon">
                <img src="{{ $imageUrl }}" alt="{{ $vehicle->year }} {{ $vehicle->brand->name }} {{ $vehicle->model }}" loading="lazy">
                <div class="actions">
                    <span class="icon-btn" aria-label="Sold"><i class="fa-regular fa-tag"></i></span>
                </div>
                <div class="sold-inventory"><img src="{{ asset('assets/img/icon/sold-inventory-icon.png') }}" alt="Sold"></div>
            </div>
            <div class="car-content">
                <div class="media-body">
                    <h3 class="box-title"><a href="{{ route('inventory.show', ['vehicle' => $vehicle->slug]) }}">{{ $vehicle->year }} {{ $vehicle->brand->name }} {{ $vehicle->model }}</a></h3>
                    @if ($vehicle->trim)<p class="box-text"><span>Trim:</span> {{ $vehicle->trim }}</p>@endif
                </div>
                <ul class="car-feature">
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt=""></div>{{ $vehicle->engine_capacity ? number_format($vehicle->engine_capacity).' cc' : 'Not listed' }}</li><li class="divider"></li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt=""></div>{{ $vehicle->transmission ? ucfirst($vehicle->transmission) : 'Not listed' }}</li><li class="divider"></li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt=""></div>{{ $vehicle->fuel_type ? ucfirst($vehicle->fuel_type) : 'Not listed' }}</li>
                </ul>
                <div class="car-bottom"><h6 class="box-title">KSh {{ number_format((float) $vehicle->price, 0) }}</h6><a class="th-btn sm style3" href="{{ route('inventory.show', ['vehicle' => $vehicle->slug]) }}">View Details <i class="fas fa-arrow-up-right"></i></a></div>
            </div>
        </div>
    </div>
@endforeach
