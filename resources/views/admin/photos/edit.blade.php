@extends('layouts.admin')


@section('content')
    <header class="p-4 mb-4 bg-secondary bg-opacity-25">
        <div class="container-fluid py-3 d-flex justify-content-between align-items-center">
            <span class="display-5 fw-bold">
                <span class="text-warning">Edit <i class="fa fa-arrow-right"></i> </span>
                {{ $photo->title }}
            </span>
            <a class="btn btn-danger" href="{{ route('admin.photos.index') }}"><i class="fa-solid fa-xmark"></i></a>
        </div>
    </header>


    <main>
        <div class="container my-4">
            @include('partials.validation_errors')
            <form action="{{ route('admin.photos.update', $photo) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                        placeholder="" value="{{ old('title', $photo->title) }}" />
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $photo->description) }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-5 align-items-center py-4">
                    @include('partials.check_image', ['width' => '200px', 'aspectRatio' => '16/9'])
                    <div class="mb-3">
                        <input type="file" class="form-control" name="image" id="image"
                            aria-describedby="imageHelper" />
                        <small id="imageHelper" class="form-text text-muted">Change image</small>
                    </div>
                </div>


                <button type="submit" class="btn btn-transparent border border-3 border-success">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Update
                </button>


            </form>
        </div>
    </main>
@endsection