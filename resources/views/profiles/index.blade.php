@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle w-100" src="{{$user->profile->profileImage()}}" alt="logo">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline pb-3">
                <div class="d-flex align-items-center">
                    <div class="h1"> {{ $user->username }} </div>

                    @cannot('update', $user->profile)
                        <follow-button user-id="{{ $user->id }}" follows="{{$follows}}"></follow-button>
                    @endcan

                </div>

                <div>
                    @can('update', $user->profile)
                        <a class="btn btn-info light-blue-btn mr-3" href="/profile/{{$user->id}}/edit">Edit Profile</a>
                    @endcan

                    @can('update', $user->profile)
                        <a class="btn btn-info light-blue-btn" href="/p/create">Add Post</a>
                    @endcan



                </div>
            </div>

            <div class="d-flex w-50 justify-content-between">
                <div><strong>{{ $postsCount }}</strong> posts</div>
                <div><strong>{{ $followersCount }}</strong> followers</div>
                <div><strong>{{ $followingCount }}</strong> following</div>
            </div>

            <div class="pt-4 font-weight-bold">
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div>
                <a href="#">{{ $user->profile->url }}</a>
            </div>

        </div>


        <div class="row pt-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{$post->id}}">
                    <img class="w-100" src="/storage/{{ $post->image }}" >
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
