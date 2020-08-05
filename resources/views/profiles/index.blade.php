@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-3 p-5">
            <img src='{{ $user->profile->profileImage() }}' class="rounded-circle w-100"/>
       </div>
       <div class="col-md-9">
           <div class="d-flex justify-content-between">
                <div>
                    <h1>{{ @$user->username ? $user->username : auth()->user()->username }}</h1>
                </div>
                <div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
           </div>
            <div class="d-flex justify-content-between align-items-baseline">
                @can('update', $user->profile)
                    <a href="{{ route('profile.edit', auth()->user()->id) }}">Edit Profile</a>
                    <a href="{{ route('post.create') }}">Add New Post</a>
                @endcan
            </div>
           <div class="row">
                <div class="col-md-4">
                    <strong>{{ $user->posts->count() }}</strong> Posts
                </div>
                <div class="col-md-4">
                    <strong>{{ $user->profile->followers->count() }}</strong> Followers
                </div>
                <div class="col-md-4">
                    <strong>{{ $user->following->count() }}</strong> Following
                </div>
           </div>
           <div class="row">
               <div class="col-12">
                   <p class="mb-1"><strong>{{ @$user->profile->title }}</strong></p>
               </div>
               <div class="col-12">
                    <p>{{ @$user->profile->description }}</p>
               </div>
           </div>
           <div class="row">
               <div class="col"><a href="#">{{ @$user->profile->url }}</a></div>
           </div>
       </div>

   </div>
   <div class="d-flex justify-content-center">
        <div class="px-5">Posts</div>
        <div class="px-5">Tagged</div>
   </div><hr/>
   <div class="row pt-5">
       @foreach($user->posts as $post)
        <div class="col-md-4 pb-4">
            <a href="/p/{{ $post->id }}"><img src="/storage/{{ $post->image }}" alt="" class="w-100 h-100" style="object-fit: cover"/></a>
        </div>
       @endforeach
   </div>
</div>
@endsection
