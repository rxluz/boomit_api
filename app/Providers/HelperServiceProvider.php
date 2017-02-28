<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //parent::boot();
      echo "ola mundo";
      foreach (glob(app_path().'/Helpers/*.php') as $filename){
        echo $filename;
          //require_once($filename);
      }
    }
}
