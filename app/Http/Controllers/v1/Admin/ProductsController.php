<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\Admin\ProductsRequest;
use \App\Models\Petshop;
use App\Models\PetshopProducts;
use \JD\Cloudder\Facades\Cloudder;

/**
 * @resource /../../{petshop_id}/products
 *
 * CRUD products, stocks, promotions
 */

class ProductsController extends Controller
{

  protected $products;

  public function __construct(PetshopProducts $products, Petshop $petshop){
    $this->products=$products;
    $this->petshop=$petshop;
  }

  /*
    Get all registers
  */
  public function index(int $petshop_id){
    return response($this->petshop->find($petshop_id)->products, 200);
  }

  public function show(int $petshop_id, int $product_id){
    return response($this->petshop->find($petshop_id)->products->where('id', $product_id), 200);
  }


  private function saveProduct($request, int $petshop_id, int $product_id=null){
    $product = $product_id == null
      ? $this->petshop->find($petshop_id)->products()
      : $this->petshop->find($petshop_id)->products->find($product_id);


    if($product_id == null){
      $product_data=new \App\Models\PetshopProducts([
        'name'=>$request->name,
        'brand'=>$request->brand,
        'especifications'=>$request->especifications,
        'picture'=>$this->storeUploadPicture($request),
        'stock_low'=>$request->stock_low,
        'active'=>1,
        'user_id'=>USER_ID
      ]);
      $product->save($product_data);
      return response(['product_id'=>$product_data->id], 200);
    }else{
      $product->name = $request->name ?? $product->name;
      $product->brand = $request->brand ?? $product->brand;
      $product->especifications = $request->especifications ?? $product->especifications;
      $product->picture=isset($request->picture) ? $this->storeUploadPicture($request) :  $product->picture;
      $product->stock_low = $request->stock_low ?? $product->stock_low;
      $product->active = 1;
      $product->user_id = USER_ID;
      $product->save();
      return response(['product_id'=>$product->id], 200);
    }

  }


  private function storeUploadPicture($request){
    if(isset($request->picture)){
      Cloudder::upload($request->picture,
              null,
              array("format" => "jpg"));
    }

    return isset($request->picture) ? Cloudder::getPublicId() : '';
  }

  public function store(ProductsRequest $request, int $petshop_id){
    return $this->saveProduct($request, $petshop_id);
  }


  public function update(ProductsRequest $request, $product_id){
    return $this->saveProduct($request, $product_id);
  }


  private function stockSave($request, $petshop_id, $product_id, $stock_id=null){
    $stock =
      $stock_id == null
      ? $this->petshop->find($petshop_id)->products()->find($product_id)->stocks()
      : $this->petshop->find($petshop_id)->products->find($product_id)->stocks->find($stock_id);


    if($stock_id == null){
      $stock_data=new \App\Models\PetshopProductStocks([
        'description'=>$request->description,
        'current_stock'=>$request->current_stock,
        'price'=>$request->price,
        'approved'=>1,
        'active'=>1,
        'user_id'=>USER_ID
      ]);
      $stock->save($stock_data);
      return response(['stock_id'=>$stock_data->id], 200);
    }else{
      $stock->current_stock = $request->current_stock ?? $stock->current_stock;
      $stock->user_id = USER_ID;
      $stock->save();
      return response(['stock_id'=>$stock->id], 200);
    }
    return response('', 200);
  }

  public function stockStore(ProductsRequest $request, $petshop_id, $product_id){
    return $this->stockSave($request, $petshop_id, $product_id);
  }

  public function stockUpdate(ProductsRequest $request, $petshop_id, $product_id, $stock_id){
    return $this->stockSave($request, $petshop_id, $product_id, $stock_id);
  }


  public function stockIndex($petshop_id, $product_id){
    return response($this->petshop->find($petshop_id)->products()->find($product_id)->stocks, 200);
  }




  private function promotionSave($request, $petshop_id, $product_id, $stock_id, $promotion_id=null){
    $promotion =
      $promotion_id == null
      ? $this->petshop->find($petshop_id)->products()->find($product_id)->stocks()->find($stock_id)->promotions()
      : $this->petshop->find($petshop_id)->products->find($product_id)->stocks->find($stock_id)->promotions->find($promotion_id);


    if($promotion_id == null){
      $promotion_data=new \App\Models\PetshopProductStockPromotions([
        'description'=>$request->description,
        'expires'=>$request->expires,
        'value'=>$request->value,
        'percent'=>$request->percent,
        'type'=>$request->type,
        'approved'=>0,
        'active'=>1,
        'user_id'=>USER_ID
      ]);
      $promotion->save($promotion_data);
      return response(['promotion_id'=>$promotion_data->id], 200);
    }else{
      // $stock->current_stock = $request->current_stock ?? $stock->current_stock;
      // $stock->user_id = USER_ID;
      // $stock->save();
      // return response(['stock_id'=>$stock->id], 200);
    }
    return response('', 200);
  }

  public function promotionStore(ProductsRequest $request, $petshop_id, $product_id, $stock_id){
    return $this->promotionSave($request, $petshop_id, $product_id, $stock_id);
  }


  public function promotionIndex($petshop_id, $product_id, $stock_id){
    return
      response(
        $this->petshop->find($petshop_id)
            ->products()->find($product_id)
              ->stocks()->find($stock_id)
                ->promotions,
        200);
  }




}
