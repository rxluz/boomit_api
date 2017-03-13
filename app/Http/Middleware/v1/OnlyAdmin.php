<?php

namespace App\Http\Middleware;

use Closure;
use Route;
//use \Illuminate\Http\Request;
use \App\Models\User;


class OnlyAdmin
{
   private $typetest="";
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type="super")
    {
      $this->typetest=$type;

      $ret=false;

      if(USER_ADMIN){
        if($type=="super" && USER_PETSHOP == false){
          $ret=true;
        }

        if($type=="petshop" && USER_PETSHOP!=false){
          $ret=true;
        }

        if($type=="all"){
          $ret=true;
        }

        if(
          $type=="superOrPetowner" &&
          (
            USER_PETSHOP_ID==$request->petshop_id ||
            USER_PETSHOP==false ||
            $request->petshop_id=='0' ||
            $request->petshop_id==""
          )
        ){
          $ret=true;
        }
      }

      return $ret ? $next($request, $type) : response('', 403);

    }


    public function terminate($request, $response){
      //echo $type. "OLAR";
      //exit;
      //echo $response;
      //echo "olar";
    }

}
