<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class PetshopRatings extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_ratings';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'user_comment', 'rating', 'petshop_comment'];

  protected $hidden = ['petshop_id', 'user_id'];

  public function user(){
    return $this->hasOne('App\Models\User', 'id', 'user_id');
  }

  protected $attributes = array(
    'petshop_comment' => ''
  );


}
