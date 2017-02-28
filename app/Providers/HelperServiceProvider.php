<?php

namespace App\Providers;

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
      foreach (glob(app_path().'/Helpers/*.php') as $filename){
        echo $filename;
          //require_once($filename);
      }
    }
}
