<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
