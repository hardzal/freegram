<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        if (auth()->check()) {
            $user = User::findOrFail(auth()->user()->id);
        } else {
            redirect('home');
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
