<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

 class Category extends Model  {
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_categories';

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
  protected $hidden = ['user_id', 'animal_type'];


  public function animal_types(){
    return $this->hasMany('App\Models\CategoryAnimalTypes', 'petshops_categories_id');
  }


  //protected $attributes = array('petshop_id' => NULL, 'parent_category_id' => NULL);



}
