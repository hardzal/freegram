<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        // $posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->get();
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(2);

        if ($request->has("search")) {
            $keyword = $request->search;
            $users = User::where('username', 'LIKE', '%' . $request->search . '%')->get();
            $posts = Post::where('caption', 'LIKE', '%' . $request->search . '%')->get();

            return view('posts.search', compact('posts', 'users', 'keyword'));
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        return view('posts.show', compact('post', 'follows'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/" . $imagePath))->fit(1200, 1200);
        $image->save();

        if ($image) {
            auth()->user()->posts()->create([
                'caption' => $data['caption'],
                'image' => $imagePath
            ]);
        }

        return redirect('/profile/' . auth()->user()->id);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post->user->profile);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post->user->profile);

        $data = request()->validate([
            'caption' => '',
            'image' => 'image'
        ]);

        $imagePath = $post->image;

        if (request('image')) {
            $imagePath = request('image')->store('uploads', 'public');

            if (file_exists('/storage/' . $post->image)) {
                File::delete('/storage/' . $post->image);
            }

            $image = Image::make(public_path("storage/" . $imagePath))->fit(1200, 1200);
            $image->save();
        }

        $post->caption = $data['caption'];
        $post->image =  $imagePath;
        $post->save();

        return redirect('/profile/' . auth()->user()->id);
    }

    public function destroy(Post $post)
    {
        if (file_exists('/storage/' . $post->image)) {
            File::delete('/storage/' . $post->image);
        }

        if ($post->delete()) {
            return redirect('profile')->with('message', 'Berhasil menghapus post!');
        }

        return redirect('profile')->with('error', 'Gagal menghapus post!');
    }
}
