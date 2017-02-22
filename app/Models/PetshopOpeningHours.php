<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

 class PetshopOpeningHours extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_openinghours';

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['day', 'hour_init', 'hour_end'];


  protected $hidden = [''];

}
