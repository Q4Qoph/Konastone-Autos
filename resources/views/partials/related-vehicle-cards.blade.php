@foreach ($relatedVehicles as $relatedVehicle)
    @php
        $image = $relatedVehicle->coverImage ?? $relatedVehicle->images->first();
        $imageUrl = $image?->url('card') ?? asset('assets/img/featured/featured-1-1.jpg');
    @endphp
    <div class="swiper-slide">
        <div class="feature-list-1">
            <div class="box-icon">
                <img src="{{ $imageUrl }}" alt="{{ $relatedVehicle->year }} {{ $relatedVehicle->brand->name }} {{ $relatedVehicle->model }}" loading="lazy">
                <div class="actions"><span class="icon-btn" aria-label="{{ ucfirst(str_replace('_', ' ', $relatedVehicle->condition)) }}"><i class="fa-regular fa-tag"></i></span></div>
            </div>
            <div class="car-content">
                <div class="media-body">
                    <h3 class="box-title"><a href="{{ route('inventory.show', $relatedVehicle) }}">{{ $relatedVehicle->year }} {{ $relatedVehicle->brand->name }} {{ $relatedVehicle->model }}</a></h3>
                    @if ($relatedVehicle->trim)
                        <p class="box-text"><span>Trim:</span> {{ $relatedVehicle->trim }}</p>
                    @endif
                </div>
                <ul class="car-feature">
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-1.svg') }}" alt=""></div>{{ $relatedVehicle->engine_capacity ? number_format($relatedVehicle->engine_capacity).' cc' : 'Not listed' }}</li><li class="divider"></li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-2.svg') }}" alt=""></div>{{ $relatedVehicle->transmission ? ucfirst($relatedVehicle->transmission) : 'Not listed' }}</li><li class="divider"></li>
                    <li><div class="icon"><img src="{{ asset('assets/img/icon/car-feature-icon-1-3.svg') }}" alt=""></div>{{ $relatedVehicle->fuel_type ? ucfirst($relatedVehicle->fuel_type) : 'Not listed' }}</li>
                </ul>
                <div class="car-bottom"><h6 class="box-title">KSh {{ number_format((float) $relatedVehicle->price, 0) }}</h6><a class="th-btn sm style3" href="{{ route('inventory.show', $relatedVehicle) }}">View Details <i class="fas fa-arrow-up-right"></i></a></div>
            </div>
        </div>
    </div>
@endforeach
