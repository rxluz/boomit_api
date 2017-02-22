<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


 class User extends Model  {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'admin_token', 'access_token'
  ];


  public function getFacebookTokenAttribute($value) {
    return ADMIN_MODE ? "" : $value;
  }


  public function address(){
      return $this->hasMany('App\Models\UserAddress', 'user_id');
  }


  public function pets(){
      return $this->hasMany('App\Models\UserPets', 'user_id');
  }




}
