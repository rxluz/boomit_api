<?php

namespace App\Http\Middleware;

use Closure;
use Route;
//use \Illuminate\Http\Request;
use \App\Models\User;


class VerifyUserToken
{

    protected $except = [
        "Admin\UserController@auth",
        "Admin\UserController@store",
    ];



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      //define('USER_LOGGED', false);
      //if token is defined verify the user permissions
      if($this->getToken($request)){
        //echo "ENTTROU AQUI DENTRO";
        $uAdmin=User::where('admin_token', $this->getToken($request)) -> first();
        if(isset($uAdmin->name) && $uAdmin->active==1 && $uAdmin->admin==1)
        {
          define('USER_ID', $uAdmin->id);
          define('USER_LOGGED', true);

          define('USER_ADMIN', true);
          define('ADMIN_MODE', true);
          define('USER_PETSHOP', $uAdmin->petshop_id>0? true : false);
          define('USER_PETSHOP_ID', $uAdmin->petshop_id);
          return $next($request);

        }else{
          $u=User::where('access_token',$this->getToken($request)) -> first();

          if(isset($u->name) && $u->active==1)
          {
            define('USER_ID', $u->id);
            define('USER_ADMIN', false);
            define('ADMIN_MODE', false);
            define('USER_LOGGED', true);
            define('USER_PETSHOP', false);
            define('USER_PETSHOP_ID', false);
            return $next($request);
          }
        }
      }

      if(!defined('USER_LOGGED')){
        define('USER_LOGGED', false);
      }

      if(!defined('USER_ADMIN')){
        define('USER_ADMIN', false);
      }

      if(!defined('ADMIN_MODE')){
        define('ADMIN_MODE', false);
      }

      if(!defined('USER_ID')){
        define('USER_ID', false);
      }

      if(!defined('USER_PETSHOP')){
        define('USER_PETSHOP', false);
      }

      if(!defined('USER_PETSHOP_ID')){
        define('USER_PETSHOP_ID', false);
      }

      $routename=Route::getCurrentRoute(false)->getActionName();
      foreach($this->except as $routeExcept){

        $routeExcept="App\Http\Controllers\\".$routeExcept;
        if($routename==$routeExcept){
          return $next($request);
        }
      }

      return response('', 401);
    }


    private function getToken($request){
      if(isset($_SERVER['HTTP_AUTHORIZATION'])){
        $token=explode("Bearer ", $_SERVER['HTTP_AUTHORIZATION']);
        //echo "ACHOU ".$token[1];
        return $token[1];
      }

      return false;
    }
}
