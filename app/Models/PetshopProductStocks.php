<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

 class PetshopProductStocks extends Model  {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'petshops_products_stocks';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['product_id', 'user_id', 'description', 'current_stock', 'price', 'approved', 'active'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];


  public function promotions(){
      return $this->hasMany('App\Models\PetshopProductStockPromotions', 'product_stocks_id');
  }


}
