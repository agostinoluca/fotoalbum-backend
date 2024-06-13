@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-secondary">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold text-light">
                {{ $photo->title }}
            </h1>
            <div class="d-flex justify-content-center gap-2">
                <a class="btn btn-transparent border border-2 py-3 text-light" href="{{ url('/') }}" role="button"><i
                        class="fa fa-home" aria-hidden="true"></i>
                    Homepage</a>
                <a class="btn btn-transparent border border-2 py-3 text-light" href="{{ url('/photos') }}" role="button"><i
                        class="fa-solid fa-layer-group"></i> All
                    Photos</a>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="rounded-3 d-flex justify-content-evenly align-items-center gap-2">
            <div class="py-5">
                @include('partials.check_image')
            </div>

        </div>

        @if ($photo->description)
            <div class="d-flex py-5">
                <div class="border rounded-3 w-100">
                    <div class="fs-2 lead p-1">Description:</div>
                    <p class="p-5 scrollable-content">{{ $photo->description }}</p>
                </div>
            </div>
        @else
            <div class="fs-2 lead py-5">No description for this photo.</div>
        @endif
    </div>
@endsection
