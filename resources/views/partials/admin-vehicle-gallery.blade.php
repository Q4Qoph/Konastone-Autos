<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    @php
        $images = $getState() ?? [];
    @endphp

    @if (count($images))
        <div class="admin-vehicle-gallery" x-data="{ active: 1 }">
            <div
                class="admin-vehicle-gallery-track"
                x-ref="photos"
                role="region"
                aria-label="Vehicle photos"
                tabindex="0"
                x-on:scroll.debounce.80ms="active = Math.round($el.scrollLeft / $el.clientWidth) + 1"
                x-on:keydown.arrow-right.prevent="$el.scrollBy({ left: $el.clientWidth })"
                x-on:keydown.arrow-left.prevent="$el.scrollBy({ left: -$el.clientWidth })"
            >
                @foreach ($images as $image)
                    <img
                        src="{{ $image['url'] }}"
                        alt="{{ $image['alt'] }} — photo {{ $loop->iteration }} of {{ $loop->count }}"
                        loading="{{ $loop->first ? 'eager' : 'lazy' }}"
                        draggable="false"
                    >
                @endforeach
            </div>
            <div class="admin-vehicle-gallery-controls">
                <button type="button" aria-label="Previous photo" x-bind:disabled="active <= 1" x-on:click="$refs.photos.scrollBy({ left: -$refs.photos.clientWidth })">←</button>
                <span aria-live="polite"><span x-text="active">1</span> / {{ count($images) }} photos</span>
                <button type="button" aria-label="Next photo" x-bind:disabled="active >= {{ count($images) }}" x-on:click="$refs.photos.scrollBy({ left: $refs.photos.clientWidth })">→</button>
            </div>
        </div>
    @else
        <p>No vehicle photos uploaded.</p>
    @endif
</x-dynamic-component>
