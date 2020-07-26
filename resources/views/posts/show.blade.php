@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="/storage/{{ $post->image }}" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="pr-3">
                            <img src="/storage/{{ $post->user->profile->avatar }}" alt="" class="w-100 rounded-circle" style="max-width:50px"/>
                        </div>
                        <div>
                            <div class="font-weight-bold d-flex">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                <a href="#" class="pl-3">Follow</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span>
                        {{ $post->caption }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
