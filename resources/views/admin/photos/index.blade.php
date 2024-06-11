@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white pt-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>My Photos</h1>
            <a class="btn btn-transparent border" href="#"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add new
                photo</a>
        </div>
    </header>

    <div class="container mt-3">

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Evidence</th>
                        <th scope="col">Published</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($photos as $photo)
                        <tr class="table-dark">
                            <td scope="row">{{ $photo->id }}</td>
                            <td><img width="150" src="{{ $photo->image }}" alt="Photo number {{ $photo->id }}"></td>
                            <td>{{ $photo->title }}</td>
                            <td>{{ $photo->evidence == 1 ? 'YES' : 'NO' }}</td>
                            <td>{{ $photo->published == 1 ? 'YES' : 'NO' }}</td>
                            <td>{{ $photo->slug }}</td>
                            <td style="white-space: nowrap;">

                                <a class="btn btn-sm btn-primary" href="{{ route('admin.photos.show', $photo) }}"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a class="btn btn-sm btn-secondary " href="{{ route('admin.photos.edit', $photo) }}"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr class="table-dark">
                            <td scope="row" colspan="8" class="text-center fw-bold text-danger">No records.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            {{ $photos->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
