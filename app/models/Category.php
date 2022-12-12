<?php

namespace App\models;
use App\models\Skill;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
