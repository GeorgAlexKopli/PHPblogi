@if ($paginator->hasPages())
    <div class="join flex justify-center my-6">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button class="join-item btn btn-disabled">«</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="join-item btn">«</a>
        @endif

        {{-- Current Page (simple pagination has no number links) --}}
        <button class="join-item btn btn-disabled">
            Page {{ $paginator->currentPage() }}
        </button>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="join-item btn">»</a>
        @else
            <button class="join-item btn btn-disabled">»</button>
        @endif
    </div>
@endif
