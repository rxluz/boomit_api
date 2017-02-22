<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

 class CategoryAnimalTypes extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_categories_types';


  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['animal_type', 'petshops_categories_id'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];



}
