@extends('layouts.admin')

@section('content')
    <div class="container p-3">

        @include('partials.action_confirm')
        @include('partials.validation_errors')

        <div class="row">
            <div class="col-5 d-flex flex-column justify-content-between">

                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input category="text" name="name" id="name" type="text" class="form-control"
                            placeholder="...enter the new category here">
                        <button class="btn btn-outline-success" type="submit">Create</button>
                    </div>


                </form>

                <div class="text-start">
                    <a class="btn btn-transparent border border-3 border-secondary" href="{{ route('admin.photos.index') }}"
                        role="button"><i class="fa-solid fa-angles-left"></i>
                        Go
                        Back</a>
                </div>


            </div>




            <div class="col-7">

                <div class="table-responsive rounded-1">
                    <table class="table table-primary">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Total categories</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr class="text-center">
                                    <td>{{ $category->id }}</td>
                                    <td>

                                        <form action="{{ route('admin.categories.update', $category) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div>
                                                <input category="text" class="form-control bg-transparent text-dark"
                                                    name="name" id="name" aria-describedby="helpId" placeholder=""
                                                    value="{{ $category->name }}" />
                                            </div>
                                        </form>


                                    </td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="text-center">
                                        <span class="badge border border-2 border-primary text-dark">
                                            {{ $category->photos->count() }}
                                        </span>
                                    </td>
                                    <td class="text-center" style="white-space: nowrap;">
                                        <!-- Modal trigger button -->
                                        <button category="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalId-{{ $category->id }}">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $category->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $category->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitle-{{ $category->id }}">
                                                    Delete category
                                                </h5>
                                                <button category="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete the category called
                                                "<strong>{{ $category->title }}</strong>"?</div>
                                            <div class="modal-footer">
                                                <button category="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admin.categories.destroy', $category) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button category="submit" class="btn btn-danger">
                                                        DELETE
                                                    </button>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr class="">
                                    <td scope="row" colspan="8" class="text-center fw-bold text-danger">No records.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
