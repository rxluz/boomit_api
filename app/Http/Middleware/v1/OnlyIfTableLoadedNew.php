<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class OnlyIfTableLoadedNew
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$parameters)
    {

      $errors="";
      foreach($parameters as $param){
        $errors=$errors.$param.",";
        if(substr($param, 0, strlen("table=")) === "table="){
          $param=str_replace("table=", "", $param);
          $table=$param;
        }

        if(substr($param, 0, strlen("field=")) === "field="){
          $param=str_replace("field=", "", $param);
          $field=$param;
        }

        if(substr($param, 0, strlen("value=")) === "value="){
          $param=str_replace("value=", "", $param);
          $value=$param;
        }

        if(substr($param, 0, strlen("and=")) === "and="){
          $param=str_replace("and=", "", $param);
          $and=$param;
        }

        if(substr($param, 0, strlen("and_value=")) === "and_value="){
          $param=str_replace("and_value=", "", $param);
          $and_value=$param;
        }

        if(substr($param, 0, strlen("except=")) === "except="){
          $param=str_replace("except=", "", $param);
          $except=$param;
        }


      }


      if(isset($and_value)){
        if(substr($and_value, 0, strlen("const@")) === "const@"){
          $and_value=str_replace("const@", "", $and_value);
          $and_value=defined($and_value) ? constant($and_value) : undefined;
        }

        if(substr($and_value, 0, strlen("param@")) === "param@"){
          $and_value=str_replace("param@", "", $and_value);
          $and_value=$request->{$and_value};
        }

        if(substr($and_value, 0, strlen("request@")) === "request@"){
          $and_value=str_replace("request@", "", $and_value);
          $and_value=$validator->getData()[$and_value];
        }

      }

      if(isset($except)){
        if(substr($except, 0, strlen("const@")) === "const@"){
          $except=str_replace("const@", "", $except);
          $except=defined($except) ? constant($except) : undefined;
        }

        if(substr($except, 0, strlen("param@")) === "param@"){
          $except=str_replace("param@", "", $except);
          $except=$request->{$except};
        }

        if(substr($except, 0, strlen("request@")) === "request@"){
          $except=str_replace("request@", "", $except);
          $except=$validator->getData()[$except];
        }
      }

      if(substr($value, 0, strlen("const@")) === "const@"){
        $value=str_replace("const@", "", $value);
        $value=defined($value) ? constant($value) : undefined;
      }


      if(substr($value, 0, strlen("param@")) === "param@"){
        $value=str_replace("param@", "", $value);
        $value=$request->{$value};
      }


      if(substr($value, 0, strlen("request@")) === "request@"){
        $value=str_replace("request@", "", $value);
        $value=$validator->getData()[$value];
      }



      $valid=isset($table) && isset($field) && isset($value);

      $and_query=
        isset($and) && isset($and_value)
        ? ' AND '.$and.' = "'.$and_value.'"'
        : "";

      $except=$except ?? false;


      if($valid){
        $exists_db = DB::select('select * from '.$table.' where '.$field.' = "'.$value.'" '.$and_query);

        if($exists_db){
          return $next($request);
        }else{
          return response('["empty:'.$errors.'"]', 404);
        }
      }


      return response('exists.data', 500);

    }


}
