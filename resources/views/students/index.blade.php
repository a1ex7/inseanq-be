@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Students') }}
                        <div class="card-header-actions">
                            <a href="{{ route('students.create') }}" class="card-header-action">
                                {{ __('Create') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        @include('components.message')
                        @include('components.search', ['route' => 'students.index'])

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th id="">{{ __('Name') }}
                                    <th id="">{{ __('Birthday') }}
                                    <th id="">{{ __('Group') }}
                                    <th id="">{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @each('students.row', $students, 'student')
                                </tbody>
                            </table>
                        </div>

                        @include('components.paginator', ['items' => $students])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
