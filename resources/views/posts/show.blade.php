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
                            <img src="/storage/{{ $post->user->profile->avatar }}" alt="" class="w-100 rounded-circle" style="max-width:40px"/>
                        </div>
                        <div>
                            <div class="font-weight-bold d-flex">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                                <follow-text user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-text>
                            </div>
                        </div>
                        <ul class="navbar-nav ml-3">
                            <li class="nav-item dropdown">
                                <a href="#" role="button"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('post.edit', $post->id) }}" class="dropdown-item">Edit</a>
                                    <form
                                    action="{{ route('post.delete', $post->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Hapus" class="btn-md dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')">Delete</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr/>
                    <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <img src="/storage/{{ $post->user->profile->avatar }}" alt="" class="w-100 rounded-circle" style="max-width:40px"/>
                        </div>
                        <div>
                            <span class="font-weight-bold">
                                <a href="/profile/{{ $post->user->id }}">
                                    <span class="text-dark">{{ $post->user->username }}</span>
                                </a>
                            </span>
                        {{ $post->caption }}
                        </div>
                    </div>
                    <div class="mt-3 text-muted">{{ $post->created_at->diffForHumans() }}</div>
                </div>
                <hr/>
                <div>
                    @foreach($post->comments as $comment)
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="d-flex align-items-center">
                                    <div class="pr-3">
                                        <img src="/storage/{{ $comment->user->profile->avatar }}" alt="" class="w-100 rounded-circle" style="max-width:30px"/>
                                    </div>
                                    <div>
                                            <span class="font-weight-bold">
                                                <a href="/profile/{{ $comment->user->id }}">
                                                    <span class="text-dark">{{ $comment->user->username }}</span>
                                                </a>
                                            </span>
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <ul class="navbar-nav ml-3">
                                    <li class="nav-item dropdown">
                                        <a href="#" role="button"  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a href="#" class="dropdown-item">Edit</a>
                                            <form
                                            action="{{ route('comment.delete', $comment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Hapus" class="btn-md dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div>
                    <form method="POST" action="{{ route('comment.create', $post->id) }}">
                        @csrf
                        <label class="col-form-label-sm">{{ $post->comments->count() }} Komentar</label>
                        <div class="row">
                            <input type="text" class="form-control col-sm-7 mr-3" name="comment"/>
                            <input type="submit" class="form-control col-sm-3 btn btn-primary"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
