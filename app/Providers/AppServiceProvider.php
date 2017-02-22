<?php

namespace App\Providers;

// include("vendor/joshtronic/php-googleplaces-master/src/GooglePlacesClient.php");
// include("vendor/joshtronic/php-googleplaces-master/src/GooglePlaces.php");
//
// define('GOOGLE_API_KEY', 'AIzaSyAazjyszAtACOYxtQ_t3UaGTrMBVHvz51M');
// define('GOOGLE_API_STREET_KEY', 'AIzaSyAazjyszAtACOYxtQ_t3UaGTrMBVHvz51M');
//
// $google_places = new joshtronic\GooglePlaces(GOOGLE_API_KEY);
//


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use \App\Http\Requests\ValidateRequest;
use Input;

use Route;

class AppServiceProvider extends ServiceProvider
{
    var $request_validate;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      require base_path('app/Http/Requests/CustomValidator.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
