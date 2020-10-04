@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Group') }}</div>
                    <div class="card-body">
                        {{ Form::model($group, [
                            'method' => 'PUT',
                            'route' => ['groups.update', ['group' => $group]]
                        ]) }}
                        @include('groups.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
