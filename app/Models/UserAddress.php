<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class UserAddress extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users_address';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'user_id', 'address', 'number', 'ajunct', 'zip_code', 'lat','long', 'city', 'state', 'active'];


  protected $hidden = ['user_id'];

  public function user(){
    return $this->hasOne('App\Models\User', 'id', 'user_id');
  }


}
