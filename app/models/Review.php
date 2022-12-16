<?php

namespace App\models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =[
        'nickname','title','description','image','vote', 'user_id'
    ];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
