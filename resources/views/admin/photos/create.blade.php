@extends('layouts.admin')


@section('content')
    <header class="p-4 mb-4 bg-secondary bg-opacity-25">
        <div class="container-fluid py-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold">Add a new Photo</h1>
            <a class="btn btn-danger" href="{{ route('admin.photos.index') }}"><i class="fa-solid fa-xmark"></i></a>
        </div>
    </header>


    <div class="container my-4">
        @include('partials.validation_errors')
        <form action="{{ route('admin.photos.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="category_id" class="form-label">Category of your photo</label>
                <select class="form-select" name="category_id" id="category_id">
                    <option value="" selected>Select one</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Add the title of new Photo here</small>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="my-4">
                <input type="file" class="form-control" name="image" id="image" aria-describedby="imageHelper" />
                <small id="imageHelper" class="form-text text-muted">Upload your new photo</small>
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-4 scrollable-content">
                <label for="tagsBox" class="form-label">Add tags to your photo for easy filtering and searching</label>
                <div id="tagsBox">
                    @foreach ($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                id="tag-{{ $tag->id }}" name="tags[]"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>


            <button type="submit" class="btn btn-transparent border border-3 border-success">
                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Photo
            </button>






        </form>
    </div>
@endsection
