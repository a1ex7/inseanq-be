<div class="row">
    <div class="col">
        {{ $items->onEachSide(1)->withQueryString()->links() }}
    </div>
    <div class="col text-right text-muted">
        @if ($items->total() > 0)
            Showing {{$items->firstItem()}} to {{ $items->lastItem() }}
            of
        @endif
        {{ $items->total() }} results
    </div>
</div>
