<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use \App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Requests\App\UserRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use \JD\Cloudder\Facades\Cloudder;
use Hash;


/**
 * @resource /app/users
 *
 * CRUD users
 */

class UserController extends Controller
{

  protected $users;

  public function __construct(User $user){
    $this->user=$user;
  }

  /**
   * [get] /
   *
   * `Requires authentication: yes`
   */
  public function show(){
    return response($this->user->find(USER_ID), 200);
  }

  private function saveUser($request, $edit_mode=false){
    /* update rules:
      - only super admin users can change informations from all users
      - petshop users can change informations only from other petshop users
    */

    $user_id = USER_ID;

    $user=
      $edit_mode
        ? $this->user->where('id', $user_id)->first()
        : $this->user;

    $user->name=isset($request->name) ? $request->name : $user->name;
    $user->admin=$user->admin ?? 0;
    $user->email=isset($request->email) ? $request->email : $user->email;
    $user->facebook_token=
      isset($request->facebook_token)
        ? $request->facebook_token
        : $user->facebook_token ?? '';

    $user->password=
      isset($request->password)
        ? Hash::make($request->password)
        : $user->password;

    $user->save();

    return response('', 200);
  }


  /**
   * [post] /
   *
   * `Requires authentication: yes`
   */
  public function store(UserRequest $request){
    $this->saveUser($request, false);

    return $this->auth($request);
  }


  /**
   * [patch] /
   *
   * `Requires authentication: yes`
   */
  public function update(UserRequest $request){
    return $this->saveUser($request, true);
  }

  /**
   * [post] /auth
   *
   * `Requires authentication: no`
   */
   public function auth(UserRequest $request)
   {
     $isFacebookWay=false;

     if(isset($request->email))
     {
       $u=User::where('email',$request->email) -> first();
     }else{
       $u=User::where('facebook_token',$request->facebook_token) -> first();
       $isFacebookWay=true;
     }

     if
     (
       isset($u->id) &&
       (
         Hash::check($request->password, $u->password) ||
         $isFacebookWay
       )
     )
     {
       $token=JWTAuth::fromUser($u);
       $u->access_token=$token;
       $u->save();
       return ['token' => $token];
     }

     return response('', 401);
   }



   private function addressSave($request, $address_id=null){
     $address =
       $address_id == null
       ? $this->user->find(USER_ID)->address()
       : $this->user->find(USER_ID)->address->find($address_id);


     if($address_id == null){
       $address_data=new \App\Models\UserAddress([
         'name'=>$request->name,
         'address'=>$request->address,
         'number'=>$request->number,
         'ajunct'=>$request->ajunct,
         'zip_code'=>$request->zip_code,
         'lat'=>$request->lat,
         'long'=>$request->long,
         'city'=>$request->city,
         'state'=>$request->state,
         'active'=>1,
         'user_id'=>USER_ID
       ]);
       $address->save($address_data);
       return response(['address_id'=>$address_data->id], 200);
     }else{
       $address->name = $request->name ?? $address->name;
       $address->address = $request->address ?? $address->address;
       $address->number = $request->number ?? $address->number;
       $address->ajunct = $request->ajunct ?? $address->ajunct;
       $address->zip_code = $request->zip_code ?? $address->zip_code;
       $address->lat = $request->lat ?? $address->lat;
       $address->long = $request->long ?? $address->long;
       $address->city = $request->city ?? $address->city;
       $address->state = $request->state ?? $address->state;

       $address->save();
       return response(['address_id'=>$address->id], 200);
     }
   }


  /**
   * [get] /address/{address_id}
   *
   * `Requires authentication: yes`
   */
  public function addressShow($address_id){
    return response($this->user->find(USER_ID)->address()->find($address_id), 200);
  }

  /**
   * [get] /address
   *
   * `Requires authentication: yes`
   */
  public function addressIndex(){
    return response($this->user->find(USER_ID)->address, 200);
  }


  /**
   * [post] /address
   *
   * `Requires authentication: yes`
   */
  public function addressStore(UserRequest $request){
    return $this->addressSave($request);
  }


  /**
   * [patch] /address
   *
   * `Requires authentication: yes`
   */
  public function addressUpdate(UserRequest $request, $address_id){
    return $this->addressSave($request, $address_id);
  }



  private function petsSave($request, $pets_id=null){
     $pets =
       $pets_id == null
       ? $this->user->find(USER_ID)->pets()
       : $this->user->find(USER_ID)->pets->find($pets_id);


     if($pets_id == null){
       $pets_data=new \App\Models\Userpets([
         'name'=>$request->name,
         'type'=>$request->type,
         'picture'=>$this->petsUploadPicture($request),
         'active'=>1,
         'user_id'=>USER_ID
       ]);
       $pets->save($pets_data);
       return response(['pets_id'=>$pets_data->id], 200);
     }else{
       $pets->name = $request->name ?? $pets->name;
       $pets->type = $request->type ?? $pets->type;
       $pets->picture=
        isset($request->picture)
          ? $this->petsUploadPicture($request)
          : $pets->picture;

       $pets->save();
       return response(['pets_id'=>$pets->id], 200);
     }
   }


  /**
   * [get] /pets/{pets_id}
   *
   * `Requires authentication: yes`
   */
  public function petsShow($pets_id){
    return response($this->user->find(USER_ID)->pets()->find($pets_id), 200);
  }

  /**
   * [get] /pets
   *
   * `Requires authentication: yes`
   */
  public function petsIndex(){
    return response($this->user->find(USER_ID)->pets, 200);
  }


  /**
   * [post] /pets
   *
   * `Requires authentication: yes`
   */
  public function petsStore(UserRequest $request){
    return $this->petsSave($request);
  }


  /**
   * [patch] /pets
   *
   * `Requires authentication: yes`
   */
  public function petsUpdate(UserRequest $request, $pets_id){
    return $this->petsSave($request, $pets_id);
  }

  private function petsUploadPicture($request){
    if(isset($request->picture)){
      Cloudder::upload
      (
        $request->picture,
        null,
        array("format" => "jpg")
      );
    }

    return isset($request->picture) ? Cloudder::getPublicId() : '';
  }

}
