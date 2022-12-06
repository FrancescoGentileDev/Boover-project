<?php

namespace App;

use App\models\Inbox;
use App\models\Sponsor;
use App\models\Skill;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'avatar', 'slug', 'phone', 'birthday_date', 'presentation', 'detailed_description', 'is_available', 'business_days', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ELoquent Relationships

    public function inboxes()
    {
        return $this->hasMany(Inbox::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class)->withPivot('expire_date', 'created_at');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
