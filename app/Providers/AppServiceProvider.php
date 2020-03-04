<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //service
        $this->app->bind('App\Contracts\Services\NewsServiceInterface', 'App\Services\NewsService');

        //dao
        $this->app->bind('App\Contracts\Dao\NewsDaoInterface', 'App\Dao\NewsDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
