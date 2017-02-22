<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use \JD\Cloudder\Facades\Cloudder;

 class PetshopProducts extends Model  {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_products';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['user_id', 'name', 'brand', 'especifications', 'picture', 'stock_low', 'active'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  public function stocks(){
      return $this->hasMany('App\Models\PetshopProductStocks', 'product_id');
  }
  
}
