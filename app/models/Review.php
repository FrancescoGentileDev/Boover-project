<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable =[
        'nickname','title','description','image','vote',
    ];
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
