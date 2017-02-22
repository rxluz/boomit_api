<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class PetshopAreas extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_areas';

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['type', 'active', 'address', 'delivery_time', 'delivery_fee'];


  protected $attributes = array(
    'google_address' => ''
  );


  protected $hidden = [''];

}
