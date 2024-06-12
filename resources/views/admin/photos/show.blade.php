@extends('layouts.admin')


@section('content')
    <header class="p-4 mb-4 bg-secondary bg-opacity-25">
        <div class="container-fluid py-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold">{{ $photo->title }}</h1>
            <div class="text-start">
                <a class="btn btn-transparent border-secondary" href="{{ route('admin.photos.index') }}" role="button">
                    <i class="fa-solid fa-angles-left"></i> Go Back
                </a>
            </div>
        </div>
    </header>


    <div class="container p-2">
        <div>
            @include('partials.check_image', ['aspectRatio' => '16/9'])
        </div>
        <div class="text-center py-3">
            <div class="bg-secondary bg-opacity-25 px-3 py-2 fs-5 rounded-2">Description:</div>
            @if ($photo->description)
                <p class="p-3 scrollable-content">{{ $photo->description }}</p>
            @else
                <p class="p-3">Oops, a description for this photo has not been provided! 😭</p>
            @endif
        </div>
    @endsection
</div>
