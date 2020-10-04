@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">{{ __('Groups') }}
                        <div class="card-header-actions">
                            <a href="{{ route('groups.create') }}" class="card-header-action">
                                {{ __('Create') }}
                            </a>
                        </div>
                    </div>

                    <div class="card-body">

                        @include('components.message')
                        @include('components.search', ['route' => 'groups.index'])

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th id="">{{ __('Number') }}</th>
                                    <th id="">{{ __('Course') }}</th>
                                    <th id="">{{ __('Faculty') }}</th>
                                    <th id="">{{ __('Students') }}</th>
                                    <th id="">{{ __('Actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @each('groups.row', $groups, 'group')

                                </tbody>
                            </table>
                        </div>

                        @include('components.paginator', ['items' => $groups])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
