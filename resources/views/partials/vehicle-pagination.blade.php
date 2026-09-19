@if ($vehicles->hasPages())
    <div class="th-pagination {{ $class ?? '' }}">
        <ul>
            <li>
                @if ($vehicles->onFirstPage())
                    <span aria-disabled="true"><i class="far fa-arrow-left"></i></span>
                @else
                    <a href="{{ $vehicles->previousPageUrl() }}"><i class="far fa-arrow-left"></i></a>
                @endif
            </li>
            @foreach ($vehicles->getUrlRange(1, $vehicles->lastPage()) as $page => $url)
                <li><a class="{{ $page === $vehicles->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a></li>
            @endforeach
            <li>
                @if ($vehicles->hasMorePages())
                    <a href="{{ $vehicles->nextPageUrl() }}"><i class="far fa-arrow-right"></i></a>
                @else
                    <span aria-disabled="true"><i class="far fa-arrow-right"></i></span>
                @endif
            </li>
        </ul>
    </div>
@endif
