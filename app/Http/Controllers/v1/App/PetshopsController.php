<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use \App\Models\Petshop;
use Illuminate\Http\Request;
use \App\Http\Requests\App\PetshopsRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use \JD\Cloudder\Facades\Cloudder;


/**
 * @resource /app/petshops
 *
 * PETSHOPS/CATEGORIES/PROMOTIONS/PRODUCTS list
 */

class PetshopsController extends Controller
{

  protected $petshop;

  public function __construct(Petshop $petshop){
    $this->petshop=$petshop;
  }

  /**
   * [get] /{petshop_id}
   *
   * `Requires authentication: no`
   */
  public function show($petshop_id, $address_id=null){
    $petshop=$this->petshop->with('categories.animal_types')->find($petshop_id);

    return response([
      "id" => $petshop->id,
      "trade_name" => $petshop->trade_name,
      "picture" => $petshop->picture,
      "distance" => 34,
      "delivery_time" => 34,
      "closes_next" => "09:00",
      "rating" => $petshop->ratings()->avg('rating'),
      "rating_total" => $petshop->ratings()->count(),
      "animals_types" => $this->getAnimalTypes($petshop->categories),
    ], 200);
  }

  /**
   * [get] {petshop_id}/byaddress/{address_id}
   *
   * Returns all information about a single petshop and the delivery fee for the given user's address
   *
   * `Requires authentication: yes`
   */
  public function showPetshopsByAddress($petshop_id, $address_id){
    return $this->show($petshop_id, $address_id);
  }

  /**
   * [get] /
   *
   * `Requires authentication: no`
   */
  public function index($address_id=null){
    $petshops=[];
    $petshops_query=$this->petshop->with('categories.animal_types')->where('active', 1)->get();

    foreach($petshops_query as $petshop){
      $petshops[]=[
        "id" => $petshop->id,
        "trade_name" => $petshop->trade_name,
        "picture" => $petshop->picture,
        "products_total" => $petshop->products()->count(),
        "rating" => $petshop->ratings()->avg('rating'),
        "rating_total" => $petshop->ratings()->count(),
        "animals_types" => $this->getAnimalTypes($petshop->categories),
        "delivery_time" => "2323"
      ];
    }

    return response($petshops, 200);
  }

  private function getAnimalTypes($categories){
    $animal_types=[];

    foreach($categories as $category){
      foreach($category->animal_types as $animal_type){
        if(!in_array($animal_type->animal_type, $animal_types)){
          $animal_types[]=$animal_type->animal_type;
        }
      }
    }

    return $animal_types;
  }

  /**
   * [get] /promotions
   *
   * `Requires authentication: no`
   */
  public function indexPromotions($address_id=null){
    return response('indexPromotions', 200);
  }

  /**
   * [get] /byaddress/{address_id}
   *
   * Returns all avaliable petshops for the given user's address
   *
   * `Requires authentication: yes`
   */
  public function indexPetshopsByAddress($address_id){
    return $this->index($address_id);
  }


  /**
   * [get] /promotions/byaddress/{address_id}
   *
   * Returns all avaliable promotions for the given user's address
   *
   * `Requires authentication: yes`
   */
  public function indexPromotionsByAddress($address_id){
    return response('indexPromotionsByAddress', 200);
  }

  /**
   * [get] /{petshop_id}/categories
   *
   * `Requires authentication: no`
   */
  public function indexCategories($petshop_id){
    return response('indexCategories', 200);
  }

  /**
   * [get] /{petshop_id}/categories/{category_id}/products
   *
   * `Requires authentication: no`
   */
  public function indexCategoriesProducts($petshop_id, $category_id){
    return response('indexCategoriesProducts', 200);
  }


  /**
   * [get] /{petshop_id}/ratings
   *
   * `Requires authentication: no`
   */
  public function indexRatings($petshop_id){
    return response($this->petshop->find($petshop_id)->ratings()->where('active', 1)->get(), 200);
  }

  /**
   * [post] /{petshop_id}/ratings
   *
   * `Requires authentication: yes`
   */
  public function storeRatings(PetshopsRequest $request, $petshop_id){
    $ratings_get=$this->petshop->find($petshop_id)->ratings();

    $rating_data=new \App\Models\PetshopRatings(['user_id'=>USER_ID, 'rating'=>$request->rating, 'user_comment'=>$request->user_comment, 'active'=>1]);

    $ratings_get->save($rating_data);


    return response('', 200);
  }




}
