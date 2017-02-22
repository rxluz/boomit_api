<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nickname', 'disability_physical', 'disability_visual', 'disability_hearing', 'disability_mental', 'school_level', 'school_certificate', 'school_type', 'courses_interest_free', 'courses_interest_discount', 'courses_interest_paid', 'courses_information', 'study_time', 'language_english', 'language_spanish',
    ];




    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
