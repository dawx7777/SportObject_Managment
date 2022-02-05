<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class NotifiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('dashboards.*', function ($view)
        {

            view()->composer('dashboards.*', function($view)
            {
               
                $countunread=DB::select("select count(is_read) as unread from users left join messages on users.id= messages.from and is_read=0 and messages.to=".Auth::id() ."
                where users.id != ". Auth::id() ."
               ");
                $view->with('countunread',$countunread);
            });


        });
    }
}
