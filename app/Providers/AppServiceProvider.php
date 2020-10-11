<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Faker\Generator as fakerGenerator;
use Faker\Factory as fakerFactory;

class AppServiceProvider extends ServiceProvider
{
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
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->extend(fakerGenerator::class, function(){
            return fakerFactory::create('pt_BR');
        });
    }
}
