@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)

        <div class="row">
            <div class="col-6 offset-3">

                <div class="d-flex align-items-center pb-2">
                    <div class="pr-3">
                        <img class="rounded-circle w-100" src="{{ $post->user->profile->profileImage() }}" style="max-width: 40px" >
                    </div>

                    <div>
                        <div class="font-weight-bold">
                            <a class="text-dark text-decoration-none" href="/profile/{{$post->user->id}}">
                                {{$post->user->username}}
                            </a>
                        </div>
                    </div>

                </div>

                <a class="text-dark text-decoration-none" href="/profile/{{$post->user->id}}">
                    <img class="w-100" src="/storage/{{ $post->image }}" >
                </a>


            </div>
        </div>

        <div class="row pt-2 pb-3">
            <div class="col-6 offset-3">
                <p><span class="font-weight-bold">
                    <a class="text-dark text-decoration-none" href="/profile/{{$post->user->id}}">
                        {{$post->user->username}}
                    </a>
                </span> {{$post->caption}}</p>
            </div>

        </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <h5>
                {{ $posts->links("pagination::bootstrap-4") }}
            </h5>
        </div>
    </div>
</div>
@endsection
