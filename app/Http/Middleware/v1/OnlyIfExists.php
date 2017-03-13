<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class OnlyIfExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param, $table, $field, $and=false, $and_value="none")
    {

      $table=str_replace("table=", "", $table);
      $field=str_replace("field=", "", $field);
      $and=str_replace("field=", "", $and);
      $and_value=str_replace("value=", "", $and_value);

      $param_orign=$param;
      $is_const=false;

      if(substr($param, 0, strlen("const=")) === "const="){
        $param=str_replace("const=", "", $param);
        $param=defined($param) ? constant($param) : false;
        $is_const=true;
      }

      $info_table=false;
      //params with ! is params from request area
      if(substr($and_value, 0, strlen("!")) === "!"){
        $and_value=str_replace("!", "", $and_value);
        $and_value=$request->{$and_value};
      }

      if(substr($table, 0, strlen("empty@")) === "empty@"){
        $table=str_replace("empty@", "", $table);
        $info_table=true;
      }

      if(substr($table, 0, strlen("empty=")) === "empty="){
        $table=str_replace("empty=", "", $table);
        $info_table=true;
      }



      $and=
        ($and!=false && $and_value!="none")
          ? " and ".$and." = '".$and_value."'"
          : "";

      $exists_db = DB::select('select * from '.$table.' where '.$field.' = "'.($is_const ? $param : $request->{$param}).'" '.$and);

      if($exists_db){

        return $next($request);
      }

      return response('["not_found:'.($info_table ? $table."(empty)" : $param_orign).'"]', 404);

    }


}
