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
                        @if(session()->has('message'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success">
                                    <i class="fa fa-info-circle"></i>{{ session('message') }}
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row mb-4">
                            <div class="col">
                                {{ Form::open(['method' => 'GET', 'route' => 'students.index']) }}
                                {{ Form::text('search', request('search'), [
                                    'class' => 'form-control',
                                    'placeholder' => __('Search...'),
                                ]) }}
                                {{ Form::close() }}
                            </div>
                        </div>
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

                        <div class="row">
                            <div class="col">
                                {{ $students->onEachSide(1)->withQueryString()->links() }}
                            </div>
                            <div class="col text-right text-muted">
                                Showing {{$students->firstItem()}} to {{ $students->lastItem() }}
                                of {{ $students->total() }} results
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
