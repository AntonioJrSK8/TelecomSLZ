<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Cliente;
use App\Models\Tecnico;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Abilidade para acesso ao sistema com permissão 
        \Gate::define('admin', function($user){
            return $user->userable instanceof Admin;
        });

        \Gate::define('tecnico', function ($user) {
            return $user->userable instanceof Tecnico;
        });

        \Gate::define('cliente', function ($user) {
            return $user->userable instanceof Cliente;
        });
        
    }
}
