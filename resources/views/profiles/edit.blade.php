@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row text-md-center">
            <h3>Edit Profile</h3>
        </div>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? @$user->profile->title }}" autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? @$user->profile->description }}" required autocomplete="description" autofocus>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="url" class="col-md-4 col-form-label text-md-right">URL</label>

                <div class="col-md-6">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? @$user->profile->url }}"/>

                    @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">Profile image</label>

                <div class="col-md-6">
                    <input type="file" name="image" id="image" class="form-control-file @error('caption') is-invalid @enderror"/>
                    @if($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
