@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">{{ __('User Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="text-center p-5">
                            <img src="{{ asset('images/login.png') }}" alt="You are logged in!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header text-center">
                <span class="fs-3">What do you want to do?</span>
            </div>
            <div class="card-body p-5 d-flex justify-content-evenly">
                <a class="btn btn-lg border btn-transparent" href="{{ url('/') }}"><i
                        class="fa-solid fa-house text-primary"></i>
                    Public home page</a>
                <a class="btn btn-lg border btn-transparent" href="{{ route('admin.photos.create') }}"><i
                        class="fa fa-plus-circle text-success" aria-hidden="true"></i> Add a new
                    photo</a>
                <a class="btn btn-lg border btn-transparent" href="{{ route('admin.photos.index') }}"><i
                        class="fa fa-pencil text-secondary" aria-hidden="true"></i> Manage existing
                    photos</a>
            </div>

        </div>
    </div>
@endsection
