<div class="row mb-4">
    <div class="col">
        {{ Form::open(['method' => 'GET', 'route' => $route, 'class' => 'form-inline']) }}
        {{ Form::text('search', request('search'), [
            'class' => 'form-control col',
            'placeholder' => __('Search...'),
        ]) }}
        @if (!empty(request('search')))
            <a href="{{ route($route) }}" class="btn btn-primary ml-2">Reset</a>
        @endif
        {{ Form::close() }}
    </div>
</div>
