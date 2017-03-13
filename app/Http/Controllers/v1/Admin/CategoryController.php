<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use \JD\Cloudder\Facades\Cloudder;

/**
 * @resource /admin/categories
 *
 * CRUD categories
 */

class CategoryController extends Controller
{

  protected $category;

  public function __construct(Category $category){
    $this->category=$category;
  }

  /*
    Get all registers
  */
  public function index(){
    $categories=$this->category->get();
    $ret=[];

    foreach($categories as $category){
      $ret[]=[
        "name" => $category->name,
        "id" => $category->id,
        "type" => $category->type,
        "petshop_id" => $category->petshop_id,
        "active" => $category->active,
        "created_at" => $category->created_at->format('Y-m-d H:i:s'),
        "updated_at" => $category->updated_at->format('Y-m-d H:i:s'),
        "parent_category_id" => $category->parent_category_id,
        "animal_types" => $this->onlyAnimalTypes($category->animal_types),
      ];
    }

    return response($ret, 200);
  }

  public function show(int $category_id){
    $category=$this->category->where('id', $category_id)->first();

    return response([
      "name" => $category->name,
      "id" => $category->id,
      "type" => $category->type,
      "petshop_id" => $category->petshop_id,
      "active" => $category->active,
      "created_at" => $category->created_at->format('Y-m-d H:i:s'),
      "updated_at" => $category->updated_at->format('Y-m-d H:i:s'),
      "parent_category_id" => $category->parent_category_id,
      "animal_types" => $this->onlyAnimalTypes($category->animal_types),
    ], 200);
  }

  private function onlyAnimalTypes($data){
    $ret=[];
    foreach($data as $d){
      $ret[]=$d->animal_type;
    }

    return $ret;
  }


  private function saveCategory($request, int $category_id=null){
    if($category_id){
      $category=$this->category->where('id', $category_id)->first();
    }else{
      $category=$this->category;
    }


    $category->name=$request->name ?? $category->name;
    $category->type=$request->type ?? $category->type;

    $category->petshop_id=
      isset($request->petshop_id)
      && $request->petshop_id!=''
      && $request->petshop_id!='null'
        ? $request->petshop_id
        : (USER_PETSHOP == true ? USER_PETSHOP_ID : $category->petshop_id);

    $category->user_id=USER_ID;

    $category->parent_category_id=
      $request->parent_category_id ??
      (
        $category_id !== null
          ? $category->parent_category_id
          : null
      );


    $category->save();

    if($category->type==0){
      $category->animal_types()->delete();
      foreach($request->animal_type as $animal_type_value){
        $category->animal_types()->create(['animal_type'=>$animal_type_value]);
      }

    }

    return response('', 200);
  }

  public function store(CategoryRequest $request ){
    return $this->saveCategory($request);
  }


  public function update(CategoryRequest $request, $category_id){
    return $this->saveCategory($request, $category_id);
  }

}
