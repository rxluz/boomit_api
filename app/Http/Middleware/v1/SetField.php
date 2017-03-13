<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\DB;

class SetField
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param, $table, $field_where, $field, $value)
    {

      DB::update('update '.$table.' set '.$field.' = "'.$value.'" where '.$field_where.' = "'.$request->{$param}.'"');

      return $next($request);

    }


}
