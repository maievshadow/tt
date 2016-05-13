<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MessageService;
use App\Services\MessageService2;
use App\Services\Message;

class MessageServiceProvider extends ServiceProvider
{

    protected $defer = true;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('zz', function($app){
            return new MessageService2('uuu');
        });

        $this->app->bind('zzz', function($app){
            return new MessageService(111);
        });
    }
}
