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
                    <label for="category_id" class="form-label">Category of your photo</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="" selected>Select one</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $photo->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


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


                <div class="pb-3">
                    <label for="tagsBox" class="form-label">Edit tags to your photo for easy filtering and
                        searching</label>
                    <div id="tagsBox" class="scrollable-content border p-2 rounded-2">
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">

                                @if ($errors->any())
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                        id="tag-{{ $tag->id }}" name="tags[]"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                                    <label class="form-check-label"
                                        for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                @else
                                    <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                        id="tag-{{ $tag->id }}" name="tags[]"
                                        {{ $photo->tags->contains($tag->id) ? 'checked' : '' }} />
                                    <label class="form-check-label"
                                        for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                @endif

                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="evidence" name="evidence" value="1"
                            @if (old('evidence', $photo->evidence)) checked @endif>
                        <label class="form-check-label" for="evidence">Check here if you want to highlight the photo</label>
                    </div>
                </div>


                <button type="submit" class="btn btn-transparent border border-3 border-success">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Update
                </button>


            </form>
        </div>
    </main>
@endsection
