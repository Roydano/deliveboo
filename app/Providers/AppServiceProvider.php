<?php

namespace App\Providers;

use Braintree\Gateway;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){

            return new Gateway(
                [

                    'environment' => 'sandbox',
                    'merchantId' => 'bqxnnwxt583rk7zx',
                    'publicKey' => 'rzt2zqkc5sx9gxc4',
                    'privateKey' => '631c1a4e51943a7aaad667b2f3ce41a5'
                ]
            );
        });
    }
}