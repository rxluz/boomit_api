<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class SetFieldNew
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
      
      foreach($params as $param){
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

        if(substr($param, 0, strlen("where=")) === "where="){
          $param=str_replace("where=", "", $param);
          $where=$param;
        }

        if(substr($param, 0, strlen("where_value=")) === "where_value="){
          $param=str_replace("where_value=", "", $param);
          $where_value=$param;
        }

      }

      if(substr($where_value, 0, strlen("const@")) === "const@"){
        $where_value=str_replace("const@", "", $where_value);
        $where_value=defined($where_value) ? constant($where_value) : undefined;
      }

      if(substr($value, 0, strlen("const@")) === "const@"){
        $value=str_replace("const@", "", $value);
        $value=defined($value) ? constant($value) : undefined;
      }

      if(substr($where_value, 0, strlen("param@")) === "param@"){
        $where_value=str_replace("param@", "", $where_value);
        $where_value=$request->{$where_value};
      }

      if(substr($value, 0, strlen("param@")) === "param@"){
        $value=str_replace("param@", "", $value);
        $value=$request->{$value};
      }

      $valid=isset($table) && isset($field) && isset($value) && isset($where) && isset($where_value);



      if($valid){
        DB::update('update '.$table.' set '.$field.' = "'.$value.'" where '.$where.' = "'.$where_value.'"');
        return $next($request);
      }

      return response('set.field', 500);

    }




}
