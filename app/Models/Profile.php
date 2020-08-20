<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        return $this->avatar ? '/storage/' . $this->avatar : "/storage/images/default-avatar.png";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    // protected $attributes = [
    //     'active' => 1
    // ];

    // public function getActiveAttribute($attribute)
    // {
    //     return $this->activeOptions()[$attribute];
    // }

    // public function scopeActive($query)
    // {
    //     return $query->where('active', 1);
    // }

    // public function scopeInactive($query)
    // {
    //     return $query->where('active', 0);
    // }

    // public function company()
    // {
    //     return $this->belongsTo(Company::class);
    // }

    // public function activeOptions()
    // {
    //     return [
    //         1 => 'Active',
    //         0 => 'Inactive',
    //         2 => 'In-Progress'
    //     ];
    // }

    // change route binding key name
    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path()
    {
        return url('/p/' . $this->id . '-' . Str::slug($this->title));
    }
}
