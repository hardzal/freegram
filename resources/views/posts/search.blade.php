@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>User Result : <em>{{ $keyword }}</em></h3><hr/>
        @if($users->count() == 0)
            <div class="alert alert-primary">
                <p>Data tidak ditemukan!</p>
            </div>
        @else
            <div class="alert alert-info"><small>{{ $users->count() }} data ditemukan</small></div>
            @foreach($users as $user)
            <div class="row pt-2 pb-3">
                <div class="d-flex align-items-center mb-3">
                    <div class="pr-3">
                        <img src="/storage/{{ $user->profile->avatar }}" alt="" class="w-100 rounded-circle" style="max-width:50px"/>
                    </div>
                    <div>
                        <div class="font-weight-bold d-flex">
                            <a href="/profile/{{ $user->id }}">
                                <span class="text-dark">{{ $user->username }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="pl-5">
                        <span>{{ $user->profile->followers->count() }} Followers</span>
                    </div>

                    <div class="pl-5">
                        <span>{{ $user->following->count() }} Following</span>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

        <h3 class="mt-5">Posts Result: <em>{{ $keyword }}</em></h2>
        <hr/>
        @if($posts->count() == 0)
            <div class="alert alert-primary">
                <p>Data tidak ditemukan!</p>
            </div>
        @else
        <div class="alert alert-info"><small>{{ $posts->count() }} data ditemukan</small></div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-3">
                    <p>
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                        </span>
                    {{ $post->caption }}
                    </p>

                    <a href="/p/{{ $post->id }}">
                        <img src="/storage/{{ $post->image }}" alt="" class="img-thumbnail"/>
                    </a>
                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection
