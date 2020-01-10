@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$postId->image}}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$postId->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width: 50px;">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$postId->user->id}}"><span class="text-dark">{{$postId->user->username}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$postId->user->id}}">
                            <span class="text-dark">{{$postId->user->username}} </span>
                        </a>
                    </span>{{$postId->caption}}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
