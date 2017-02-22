<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \JD\Cloudder\Facades\Cloudder;

 class Petshop extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops';

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
  protected $hidden = ['user_id'];


  public function getPictureAttribute($value) {
    return
      trim($value)!=''
        ? Cloudder::secureShow($value, array("width" => 250, "height" => 250, "crop" => "fill"))
        : '';
  }

  public function products(){
      return $this->hasMany('App\Models\PetshopProducts', 'petshop_id');
  }



  public function ratings(){
      return $this->hasMany('App\Models\PetshopRatings', 'petshop_id');
  }

  public function openinghours(){
      return $this->hasMany('App\Models\PetshopOpeningHours', 'petshop_id');
  }

  public function areas(){
      return $this->hasMany('App\Models\PetshopAreas', 'petshop_id');
  }

  public function categories(){
      return $this->hasMany('App\Models\Category', 'petshop_id');
  }


  // public function animals_type(){
  //     return $this->hasMany('App\Models\Category', 'petshop_id');
  // }
  //



}
