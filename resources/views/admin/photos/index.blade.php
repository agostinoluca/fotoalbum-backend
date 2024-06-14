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


    <main>
        <div class="container mt-5">
            @include('partials.action_confirm')


            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless table-secondary align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-nowrap">Category
                                <a href="{{ route('admin.categories.index') }}">
                                    <i class="fa fa-plus-circle text-secondary" aria-hidden="true"></i>
                                    <i class="fa fa-pencil text-secondary" aria-hidden="true"></i>
                                </a>
                            </th>
                            <th scope="col" class="text-nowrap">Tags
                                <a href="{{ route('admin.tags.index') }}">
                                    <i class="fa fa-plus-circle text-secondary" aria-hidden="true"></i>
                                    <i class="fa fa-pencil text-secondary" aria-hidden="true"></i>
                                </a>
                            </th>
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
                                <td>{{ $photo->category ? $photo->category->name : 'N/A' }}</td>
                                <td style="max-width: 200px;" class="text-nowrap text-truncate">
                                    @forelse ($photo->tags as $tag)
                                        <span class="badge bg-info bg-opacity-75 text-black p-1">{{ $tag->name }}</span>
                                    @empty
                                        No Tags
                                    @endforelse
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


                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $photo->id }}">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modalId-{{ $photo->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitle-{{ $photo->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                    role="document">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{ $photo->id }}">
                                                <span class="text-danger">Delete </span><span>{{ $photo->title }}</span>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="p-3">
                                            @include('partials.check_image', [
                                                'width' => '400px',
                                                'aspectRatio' => '16/9',
                                            ])
                                        </div>
                                        <div class="modal-body">Are you sure you want to delete this photo?</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>

                                            <form action="{{ route('admin.photos.destroy', $photo) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    DELETE
                                                </button>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
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
    </main>
@endsection
