<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class GetLists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $table, $fieldname, $fieldvalue, $fieldslist)
    {
      //params with ! is params from request area
      // if(substr($and_value, 0, strlen("!")) === "!"){
      //   $and_value=str_replace("!", "", $and_value);
      //   $and_value=$request->{$and_value};
      // }


      return $next($request);

    }

    public function terminate(){
      //echo "OLAR LISTS";
    }


}
