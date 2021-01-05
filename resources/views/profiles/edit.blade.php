@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row pt-3">
                    <h1>Edit Profile</h1>
                </div>

                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Title</label>

                    <input id="title"
                           type="text"
                           class="form-control @error('title') is-invalid @enderror" name="title"
                           name="title"
                           value="{{ $user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Description</label>

                    <textarea id="description"
                           rows="4"
                           class="form-control @error('description') is-invalid @enderror" name="description"
                           name="description"
                              autocomplete="description" autofocus >{{ $user->profile->description }}</textarea>

                    @error('description')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="url" class="col-md-4 col-form-label">URL</label>

                    <input id="url"
                           type="text"
                           class="form-control @error('url') is-invalid @enderror" name="url"
                           name="url"
                           value="{{ $user->profile->url }}" autocomplete="url" autofocus>

                    @error('url')
                    <strong>{{ $message }}</strong>
                    @enderror

                </div>

                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>

                <div class="row pt-4 justify-content-end">
                    <button class="btn btn-primary">Save</button>
                </div>


            </div>
        </div>



    </form>
</div>
@endsection
