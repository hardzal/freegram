@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row text-md-center">
                    <h1>Create New Post</h1>
                </div>
                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label text-md-right">Caption</label>
                        <div class="col-md-6">
                            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>

                            @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Post image</label>

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
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
