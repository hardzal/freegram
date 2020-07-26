<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id = null)
    {
        $user = null;
        if ($id != null) {
            $user = User::findOrFail($id);
        } else {
            $user = User::findOrFail(auth()->user()->id);
        }

        return view('profiles.index', compact('user'));
    }

    public function show($username)
    {
        $user = User::firstWhere('username', $username);
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user) //  Route Model Binding
    {
        // $user->load('profile');
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'avatar' => 'image'
        ]);

        $imagePath = $user->profile->avatar;

        if (request('image')) {
            $imagePath = request('image')->store('images/profiles', 'public');
            $image = Image::make(public_path("storage/" . $imagePath))->fit(1200, 1200);
            $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['avatar' => $imagePath]
        ));

        return redirect()->route('profile.index');
    }
}
