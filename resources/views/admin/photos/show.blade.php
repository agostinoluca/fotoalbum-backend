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

    <main>
        <div class="container p-2">
            <div>
                @include('partials.check_image', ['aspectRatio' => '16/9'])
            </div>
            <div class="text-center py-3">
                <div class="row py-3">

                    <div class="col">
                        <div class="bg-secondary bg-opacity-25 px-3 py-2 fs-5 rounded-2 text-nowrap">Created at:</div>
                        <div class="lead pt-3">{{ $photo->created_at }}</div>
                    </div>

                    <div class="col">
                        <div class="bg-secondary bg-opacity-25 px-3 py-2 fs-5 rounded-2">Published</div>
                        @if ($photo->published)
                            <div class="pt-3 fs-4 fw-medium"><i class="fa-solid fa-check text-success"></i></div>
                        @else
                            <div class="pt-3 fs-4 fw-medium"><i class="fa-solid fa-xmark text-danger"></i></div>
                        @endif
                    </div>

                    <div class="col">
                        <div class="bg-secondary bg-opacity-25 px-3 py-2 fs-5 rounded-2">Featured</div>
                        @if ($photo->evidence)
                            <div class="pt-3 fs-4 fw-medium"><i class="fa-solid fa-check text-success"></i></div>
                        @else
                            <div class="pt-3 fs-4 fw-medium"><i class="fa-solid fa-xmark text-danger"></i></div>
                        @endif
                    </div>
                </div>



                <div class="row">

                    <div class="col">
                        <div class="bg-secondary bg-opacity-25 px-3 py-3 fs-5 rounded-2">Description:</div>
                        @if ($photo->description)
                            <p class="p-3 scrollable-content">{{ $photo->description }}</p>
                        @else
                            <p class="p-3">Oops, a description for this photo has not been provided! 😭</p>
                        @endif
                    </div>

                    <div class="col">
                        @if ($photo->tags->isNotEmpty())
                            <div class="bg-secondary bg-opacity-25 px-3 py-3 fs-5 rounded-2 text-nowrap">Used tags</div>
                            <div class="py-3 scrollable-content">
                                @foreach ($photo->tags as $tag)
                                    <span class="p-1 justify-content-center">
                                        <span class="lead px-1 rounded-2 bg-primary bg-opacity-50">
                                            {{ $tag->name }}
                                        </span>
                                    </span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="col">
                        @if ($photo->category)
                            <div class="bg-secondary bg-opacity-25 px-3 py-3 fs-5 rounded-2">Category</div>
                            <div class="py-3 fs-5 fw-medium">{{ $photo->category->name }}</div>
                        @endif
                    </div>
                </div>


            </div>
    </main>
@endsection
</div>
