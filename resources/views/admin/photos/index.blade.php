@extends('layouts.admin')

@section('content')
    <header class="p-4 mb-4 bg-secondary bg-opacity-25">
        <div class="container-fluid py-3 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold">My Photos</h1>
            <a class="btn btn-transparent border" href="{{ route('admin.photos.create') }}"> <i class="fa fa-plus-circle"
                    aria-hidden="true"></i> Add new
                photo</a>
        </div>
    </header>


    <div class="container mt-5">
        @include('partials.action_confirm')


        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                <thead>
                    <tr class="text-center">
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
                        <tr class="table-dark text-center">
                            <td scope="row">{{ $photo->id }}</td>
                            <td>
                                @include('partials.check_image', [
                                    'width' => '200px',
                                    'aspectRatio' => '16/9',
                                ])
                            </td>
                            <td>{{ $photo->title }}</td>
                            <td>{{ $photo->evidence == 1 ? 'YES' : 'NO' }}</td>
                            <td>{{ $photo->published == 1 ? 'YES' : 'NO' }}</td>
                            <td>{{ $photo->slug }}</td>
                            <td style="white-space: nowrap;">

                                <a class="btn btn-sm btn-primary" href="{{ route('admin.photos.show', $photo) }}"><i
                                        class="fa fa-eye" aria-hidden="true"></i></a>

                                <a class="btn btn-sm btn-secondary " href="{{ route('admin.photos.edit', $photo) }}"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>

                                <a href="#">DELETE</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="table-dark">
                            <td scope="row" colspan="7" class="text-center fw-bold text-danger">No records.</td>
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
