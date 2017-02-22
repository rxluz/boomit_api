<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Requests\Admin\UserRequest;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Hash;

/**
 * @resource /admin/users
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
   * [post] /auth
   *
   * Users admin authentication requires an user allowed to use the admin area
   * `Requires authentication: no`
   */
  public function auth(UserRequest $request)
  {
    $isFacebookWay=false;

    if(isset($request->email))
    {
      $u=User::where('email',$request->email) -> first();
    }


    if(!isset($u->id) && isset($request->facebook_token))
    {
      $u=User::where('facebook_token',$request->facebook_token) -> first();
      $isFacebookWay=true;
    }

    if
    (
      isset($u->id) &&
      (
        Hash::check($request->password, $u->password) ||
        $isFacebookWay
      )  &&
      $u->active==1
    )
    {
      $token=JWTAuth::fromUser($u);
      //verify this request is admin and this user is admin
      if(isset($request->admin_mode) && $request->admin_mode==1){
        if($u->admin!==1){
          return response($u->admin, 403);
        }
        $u->admin_token=$token;
        $u->save();
        return ['token_admin' => $token];
      }else{
        $u->access_token=$token;
        $u->save();
        return ['token' => $token];
      }
    }elseif(isset($u->id) && $u->active==0){
      return response('', 403);
    }

    return response('', 404);
  }


  /**
   * [get] /
   *
   * Get all users registered
   * `Requires authentication: yes`
   */
   public function index(){
    if(ADMIN_MODE==false){
      return response('', 403);
    }

    $fields=['id', 'name', 'email', 'active', 'updated_at', 'admin', 'petshop_id'];
    if(USER_PETSHOP){
      return $this->user->where('petshop_id', USER_PETSHOP_ID)->get($fields);
    }

    return $this->user->all($fields);
  }


  /**
   * [get] /{user_id}
   *
   * Get a single user infos
   * `Requires authentication: yes`
   */
  public function show(int $user_id){
    if(ADMIN_MODE==false && $user_id!==0){
      return response('', 403);
    }

    $u=ADMIN_MODE==false ? $this->user->find(USER_ID) : $this->user->find($user_id !== 0 ? $user_id : USER_ID);

    if(!isset($u->id)){
      return response('', 404);
    }

    if(ADMIN_MODE==false && $u->active==0){
      response('', 404);
    }

    if(ADMIN_MODE==true && USER_PETSHOP==true && $u->petshop_id!=USER_PETSHOP_ID){
      return response('', 403);
    }

    return isset($u->name) ? $u : response('', 404);

  }


  private function saveUser($request, int $user_id=null){
    //return $this->saveUser($request);
    //block if is creating a admin user and the logged user isnt admin
    if($request->admin==1 && ADMIN_MODE==false){
      return response('', 403);
    }

    if(isset($request->petshop_id) && ADMIN_MODE==true && USER_PETSHOP==true && USER_PETSHOP_ID!=$request->petshop_id){
      return response("", 403);
    }

    /* update rules:
      - only super admin users can change informations from all users
      - petshop users can change informations only from other petshop users
    */

    $user_id =
      $user_id==null
        ? $user_id
        : $user_id == "0" ? USER_ID : $user_id;


    $user=
      $user_id !== null
        ? $this->user->where("active", 1)->where('id', $user_id)->first()
        : $this->user;

    if($user_id!==null){
      if(!isset($user->name)){
        return response('', 404);
      }

      if(ADMIN_MODE == false && $user_id!=$user->id){
        return response('', 403);
      }

      if(isset($request->petshop_id) && USER_PETSHOP && $request->petshop_id!=$user->petshop_id){
        return response('', 403);
      }
    }

    $user->name=isset($request->name) ? $request->name : $user->name;
    $user->admin=isset($request->admin) ? $request->admin == 1 ? 1 : 0 : $user->admin ?? 0;
    $user->petshop_id=$this->setPetshopId($user_id !== null ? $user->petshop_id : null, $request);
    $user->email=isset($request->email) ? $request->email : $user->email;
    $user->facebook_token=isset($request->facebook_token) ? $request->facebook_token : $user->facebook_token ?? '';

    $user->password=isset($request->password) ? Hash::make($request->password) : $user->password;
    $user->save();

    return response('', 200);
  }



  /**
   * [post] /
   *
   * Create a new user
   * `Requires authentication: yes`
   */
  public function store(UserRequest $request){
    return $this->saveUser($request);
  }


  private function setPetshopId($oldval, $request){
    if($request->admin==0){
        return $oldval;
    }

    if(ADMIN_MODE==FALSE){
      return $oldval;
    }

    if(USER_PETSHOP==true){
      return USER_PETSHOP_ID;
    }

    if(isset($request->petshop_id)){
      return
        $request->petshop_id=="null"
          ? null
          : $request->petshop_id;
    }

    return $oldval;
  }



  /**
   * [patch] /{user_id}
   *
   * Update user infos
   * `Requires authentication: yes`
   */
  public function update(UserRequest $request, $user_id){
    return $this->saveUser($request, $user_id);
  }


  private function setActive($active, $user_id=0){
    if(ADMIN_MODE==false && $user_id!==0 && $user_id!=USER_ID){
      return response('', 403);
    }

    $u=ADMIN_MODE==false ? $this->user->find(USER_ID) : $this->user->find($user_id !== 0 ? $user_id : USER_ID);
    if(isset($u->name)){
      if(ADMIN_MODE && USER_PETSHOP && USER_PETSHOP_ID!=$u->petshop_id){
        return response('', 403);
      }
      $u->active=$active;
      $u->save();
      return response('', 200);
    }else{
      return response('', 404);
    }
  }

  /**
   * [delete] /{user_id}
   *
   * Disable user
   * `Requires authentication: yes`
   */
  public function destroy($user_id=0){
    return $this->setActive(0, $user_id);
  }

  /**
   * [put] /{user_id}
   *
   * Enable users
   * `Requires authentication: yes`
   */
  public function restore($user_id){
    return $this->setActive(1, $user_id);
  }
}
