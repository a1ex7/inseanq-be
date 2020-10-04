@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Student') }}</div>
                    <div class="card-body">
                        {{ Form::model($student, [
                            'method' => 'PUT',
                            'route' => ['students.update', ['student' => $student]]
                        ]) }}
                        @include('students.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
