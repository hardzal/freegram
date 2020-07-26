@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="/storage/{{ $post->image }}" alt="" class="img-thumbnail"/>
            </div>
            <div class="col-md-4">
                <h4>{{ $post->user->username }}</h4>
                <p>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
@endsection
