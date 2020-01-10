@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="{{ $user->profile->profileImage() }}"
                    class="rounded-circle w-100">
            </div>

            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <h4>{{ $user->username }}</h4>

                        <follow-button user-id="{{$user->id}}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                    <a href="/p/create">Add new post</a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() + 2 }}</strong> posts</div>
                    <div class="pr-5"><strong>8k</strong> followers</div>
                    <div class="pr-5"><strong>18k</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
                <div>"Programming isn't about what you know, it's about what you can figure out." - Chris Pine</div>
            </div>
            <div class="row pt-5">

                @foreach($user->posts as $post)
                    <div class="col-4">
                        <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" class="w-100">
                        </a>
                    </div>
                @endforeach

                <div class="col-4 pb-4">
                    <img src="https://pbs.twimg.com/media/ELvKQHJWwAELqw6?format=jpg&name=medium" class="w-100">
                </div>
                <div class="col-4 pb-4">
                    <img src="https://pbs.twimg.com/media/ELvH9lSWsAADKgU?format=jpg&name=small" class="w-100">
                </div>
            </div>

        </div>

    </div>
@endsection
