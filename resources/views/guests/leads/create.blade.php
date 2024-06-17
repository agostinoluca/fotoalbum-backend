@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light">
        <div class="container py-2">
            <div class="d-flex justify-content-between align-items-center pb-4">
                <h1 class="display-5 fw-bold">Contact me!</h1>
                <a class="btn btn-danger" href="{{ route('welcome') }}"><i class="fa-solid fa-xmark"></i></a>
            </div>

            <p class="fs-3">
                Thank you for visiting my contact form. Whether you're looking to capture special moments or
                create lasting memories with stunning photography, I'm here to help. Please feel free to reach out to me
                with any questions you have about my photography albums. I look forward to hearing from you and discussing
                how we can create beautiful images together.
            </p>
        </div>
    </div>


    <div class="container">

        @include('partials.action_confirm')
        @include('partials.validation_errors')

        <form action="{{ route('contacts.store') }}" id="contact-form" method="post">
            @csrf

            <div class="mb-3">
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelper"
                    placeholder="Name Surname" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">type your full name </small>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelper"
                    placeholder="example@mail.com" value="{{ old('email') }}" />
                <small id="emailHelper" class="form-text text-muted">type your email address </small>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Your message</label>
                <textarea class="form-control" name="message" id="message" rows="5">{{ old('message') }}</textarea>
                @error('message')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success px-3">
                Send
            </button>



        </form>
    </div>
@endsection
