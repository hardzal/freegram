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
