<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        $user->profile->update($data);

        return redirect()->back();
    }
}
