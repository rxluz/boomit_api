<?php

namespace App\Models;
use \JD\Cloudder\Facades\Cloudder;
use Illuminate\Database\Eloquent\Model;

 class UserPets extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'users_pets';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'user_id', 'type', 'picture', 'active'];


  public function getPictureAttribute($value) {
    return
      trim($value)!=''
        ? Cloudder::secureShow($value, array("width" => 250, "height" => 250, "crop" => "fill"))
        : '';
  }


  protected $hidden = ['user_id'];

  public function user(){
    return $this->hasOne('App\Models\User', 'id', 'user_id');
  }


}
