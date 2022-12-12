<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Sponsor extends Model
{
    //
    protected $fillable = [
        'type','duration','price'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('expire_date', 'created_at');
    }
}
