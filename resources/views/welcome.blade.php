@extends('layouts.app')
@section('content')
    <main>
        <div class="welcome_jumbotron">

            <div class="bg-black bg-opacity-75 p-5 mb-4">
                <div class="container-fluid text-light min-vh-100">
                    <h1 class="display-5 fw-bold">Welcome to Fotoalbum</h1>
                    <p class="col-md-8 fs-4 py-4">
                        Discover a world of memories with Fotoalbum, your ultimate destination for storing and sharing your
                        precious photos. Whether it's cherished family moments, breathtaking travel adventures, or everyday
                        snapshots, Fotoalbum offers a secure and user-friendly platform to keep your photos organized and
                        accessible. Relive your favorite moments anytime, anywhere, and share them effortlessly with friends
                        and loved ones. Join us today and start building your personal photo collection with Fotoalbum.
                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <h5>Look at my featured photos</h5>
                        <a class="text-light" href="#featured_photo"><i class="fa fa-chevron-circle-down fa-2x"></i></a>
                    </div>
                </div>
            </div>

            <div class="container-fluid text-center py-5">
                <div id="featured_photo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="row" id="featured_photo">
                            @forelse ($featured_photo as $index => $photo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <a href="{{ route('photos.show', $photo) }}" class="text-decoration-none">
                                        <div>
                                            @include('partials.check_image', [
                                                'width' => '70%',
                                                'aspectRatio' => '16/9',
                                            ])
                                        </div>
                                    </a>
                                </div>
                            @empty
                                <div class="container text-center pb-5">
                                    <img width="600px" class="rounded-4" src="{{ asset('images/not_available.jpg') }}"
                                        alt="no photos available">
                                    <div class="display-5 lead pt-4">Sorry, we do not have any photos to show...</div>
                                </div>
                            @endforelse
                        </div>

                        @if (count($featured_photo) > 1)
                            <a class="carousel-control-prev" href="#featured_photo" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#featured_photo" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
