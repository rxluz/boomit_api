<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Http\Requests\Admin\PetshopRequest;
use \App\Models\Petshop;
use \App\Models\PetshopOpeningHours;
use \App\Models\PetshopAreas;
use \JD\Cloudder\Facades\Cloudder;
use DB;

/**
 * @resource /admin/petshops
 *
 * CRUD petshops, areas, ratings and more
 */

class PetshopController extends Controller
{

  protected $petshops;

  public function __construct(Petshop $petshop){
    $this->petshop=$petshop;

  }

  /*
    Get all registers
  */
  public function index(){
    return response($this->petshop->get(), 200);
  }

  public function show(int $petshop_id){
    return response($this->petshop->find($petshop_id), 200);
  }

  public function single(){
    return response($this->petshop->find(USER_PETSHOP_ID), 200);
  }


  private function savePetshop($request, int $petshop_id=null){

    $petshop=$petshop_id == null ? $this->petshop : $this->petshop->where("id", $petshop_id)->first();

    $petshop->cnpj=$request->cnpj ?? $petshop->cnpj;
    $petshop->email=$request->email ?? $petshop->email;
    $petshop->company_name=$request->company_name ?? $petshop->company_name;
    $petshop->ie=$request->ie ?? $petshop->ie;
    $petshop->trade_name=$request->trade_name ?? $petshop->trade_name;
    $petshop->phone=$request->phone ?? $petshop->phone;
    $petshop->address=$request->address ?? $petshop->address;
    $petshop->google_address=$request->google_address ?? $petshop->google_address;
    $petshop->google_city="sadasd";
    $petshop->zip_code=$request->zip_code ?? $petshop->zip_code;
    $petshop->picture=isset($request->picture) ? $this->storeUploadPicture($request) :  $petshop->picture;
    $petshop->user_id=USER_ID;

    $petshop->save();

    return response(['petshop_id'=>$petshop->id], 200);
  }

  public function store(PetshopRequest $request ){
    return $this->savePetshop($request);
  }


  private function storeUploadPicture($request){
    if(isset($request->picture)){
      Cloudder::upload($request->picture,
              null,
              array("format" => "jpg"));
    }

    return isset($request->picture) ? Cloudder::getPublicId() : '';
  }



  public function update(PetshopRequest $request, $petshop_id){
    return $this->savePetshop($request, $petshop_id);
  }


  public function indexAreas($petshop_id){
    return response($this->petshop->find($petshop_id)->areas, 200);
  }

  public function storeArea(PetshopRequest $request, $petshop_id){
    $area_get=$this->petshop->find($petshop_id)->areas();

    DB::table('petshops_areas')
      ->where('petshop_id', $petshop_id)
      ->where('type', $request->type)
      ->where('address', $request->address)
      ->delete();


    $area_data=new \App\Models\PetshopAreas(['type'=>$request->type, 'active'=>$request->active, 'address'=>$request->address, 'delivery_time'=>$request->delivery_time, 'delivery_fee'=>$request->delivery_fee]);

    $area_get->save($area_data);

    return response('', 200);
  }

  public function updateArea(PetshopRequest $request, $petshop_id, $area_id){
    $area_get=$this->petshop->find($petshop_id)->areas()->where('id', $area_id)->first();
    $area_get->type=$request->type ?? $area_get->type;
    $area_get->active=$request->active ?? $area_get->active;
    $area_get->address=$request->address ?? $area_get->address;
    $area_get->delivery_time=$request->delivery_time ?? $area_get->delivery_time;
    $area_get->delivery_fee=$request->delivery_fee ?? $area_get->delivery_fee;
    $area_get->save();

    return response('', 200);
  }



  public function indexOpeningHours($petshop_id){
    return response($this->petshop->find($petshop_id)->openinghours, 200);
  }




  public function storeOpeningHour(PetshopRequest $request, $petshop_id){
    //is forbidden post two hours to same petshop and same day and same hours
    if(!$this->verifyHourRange($petshop_id, $request->day, $request->hour_init, $request->hour_end)){
        return response('["hour_range_duplicated:hour_init('.$request->hour_init.'):hour_end('.$request->hour_end.')"]', 412);
    }

    $openinghours_get=$this->petshop->find($petshop_id)->openinghours();


    $openinghours_data=new \App\Models\PetshopOpeningHours(['day'=>$request->day, 'hour_init'=>$request->hour_init, 'hour_end'=>$request->hour_end]);

    $openinghours_get->save($openinghours_data);

    return response('', 200);
  }

  private function verifyHourRange($petshop_id, $day, $hour_init, $hour_end){
    $openinghours_get=$this->petshop->find($petshop_id)->openinghours()->where('day', $day)->get();
    $hour_end=strtotime($hour_end);
    $hour_init=strtotime($hour_init);

    $ret=true;
    foreach($openinghours_get as $openinghour){
      $opening_end=strtotime($openinghour->hour_end);
      $opening_init=strtotime($openinghour->hour_init);

      if($hour_init >= $opening_init && $hour_init<=$opening_end){
        $ret=false;
      }


      if($hour_end >= $opening_init && $hour_end<=$opening_end){
        $ret=false;
      }

      if($hour_init <= $opening_init && $hour_end>=$opening_end){
        $ret=false;
      }
    }

    return $ret;
  }


  public function restore($petshop_id){
    return response('', 200);
  }

  public function ratingShow($petshop_id){
    $ratings_get=$this->petshop->find($petshop_id)->ratings;
    $ratings=[];

    foreach($ratings_get as $rating){
      $ratings[]=[
        "id" => $rating->id,
        "user_infos" => $rating->user,
        "rating" => $rating->rating,
        "user_comment" => $rating->user_comment,
        "petshop_comment" => $rating->petshop_comment,
        "active" => (int) $rating->active,
      ];
    }

    return response($ratings, 200);
  }

  public function ratingUpdate(PetshopRequest $request, $petshop_id, $rating_id){
    $ratings_get=$this->petshop->find($petshop_id)->ratings;
    $rating=$ratings_get->find($rating_id);
    $rating->petshop_comment=$request->petshop_comment;
    $rating->save();

    return response("", 200);
  }


}
