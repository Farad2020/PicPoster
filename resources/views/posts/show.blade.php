@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 offset-1">

            <img class="w-100" src="/storage/{{ $post->image }}" >

        </div>

        <div class="col-4">
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <img class="rounded-circle w-100" src="/storage/{{ $post->user->profile->image }}" style="max-width: 40px" >
                </div>

                <div>
                    <div class="font-weight-bold">
                        <a class="text-dark text-decoration-none" href="/profile/{{$post->user->id}}">
                            {{$post->user->username}}
                        </a>

                        <a class="text-decoration-none pl-3" href="#">
                            Follow
                        </a>
                    </div>
                </div>

            </div>

            <hr/>

            <p><span class="font-weight-bold">
                    <a class="text-dark text-decoration-none" href="/profile/{{$post->user->id}}">
                        {{$post->user->username}}
                    </a>
                </span> {{$post->caption}}</p>
        </div>

    </div>
</div>
@endsection
