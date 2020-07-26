@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-md-3 p-5">
            <img src='{{ url('images/prof.jpg')}}' class="rounded-circle"/>
       </div>
       <div class="col-md-9">
           <div class="row">
                <div class="col-md-4">
                    <h1>{{ @$user->username ? $user->username : auth()->user()->username }}</h1>
                </div>
                <div class="col-md-6">
                    <button>Message</button>
                    <button>Follow</button>
                    <button>Related</button>
                    <button>Option</button>
                </div>
                <div class="d-flex">
                    <a href="{{ route('profile.edit') }}">Edit Profile</a>
                    <a href="{{ route('post.create') }}">Add New Post</a>
                </div>
           </div>
           <div class="row">
                <div class="col-md-4">
                    <strong>100</strong> Posts
                </div>
                <div class="col-md-4">
                    <strong>500</strong> Followers
                </div>
                <div class="col-md-4">
                    <strong>5</strong> Following
                </div>
           </div>
           <div class="row">
               <div class="col">
                   <p>{{ @$user->profile->title }}</p>
               </div>
               <div class="col">
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
        @foreach($posts as $post)
            <div class="col-md-4">
                    <img src="/storage/{{ $post->image }}" alt="" class="w-100"/>
            </div>
        @endforeach
   </div>
</div>
@endsection
