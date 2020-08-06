@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="row">
                <div class="col-md-6 offset-3">
                    <img src="/storage/{{ $post->image }}" alt="" class="img-thumbnail"/>
                </div>
            </div>
            <div class="row pt-2 pb-3">
                <div class="col-md-6 offset-3">
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
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
