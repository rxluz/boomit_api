<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class DelRow
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param, $table, $field_where)
    {

      DB::update('delete from '.$table.' where '.$field_where.' = "'.$request->{$param}.'"');

      return $next($request);

    }


}
