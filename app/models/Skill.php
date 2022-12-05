<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'image', 'slug', 'category',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
