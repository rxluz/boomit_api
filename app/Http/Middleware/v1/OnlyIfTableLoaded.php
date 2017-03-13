<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class OnlyIfTableLoaded
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $table, $field=false, $value=false)
    {
      $info_table=false;
      //params with ! is params from request area
      if(substr($value, 0, strlen("param@")) === "param@"){
        $value=str_replace("param@", "", $value);
        $value=$request->{$value};
      }

      $where=$field ? "where $field='$value'" : "";
      $where_info=$field ? "($field:$value)" : "";

      $exists_db = DB::select('select * from '.$table.' '.$where);

      if($exists_db){
        return $next($request);
      }

      return response('["empty:'.$table.$where_info.'"]', 404);

    }


}
