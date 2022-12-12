<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Inbox extends Model
{
    protected $fillable = ['user_id', 'date', 'nickname', 'title', 'content', 'email', 'phone'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
