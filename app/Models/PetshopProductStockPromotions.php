<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

 class PetshopProductStockPromotions extends Model  {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_products_stocks_promotions';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['product_id', 'product_stocks_id', 'user_id', 'type', 'percent', 'value', 'price', 'expires', 'active', 'approved', 'description'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];


  protected $attributes = array(
    'price' => 0
  );



}
