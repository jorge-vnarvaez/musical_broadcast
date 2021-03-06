<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Artista;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('organizar', function(User $user) {
            return $user->is_organizador();
        });

        Gate::define('modificar-artista', function(User $user, Artista $artista) {
            return ($user->is_organizador() && $user->rut == $artista->user_rut);
        });

        Gate::define('representar', function(User $user) {
            return $user->is_representante();
        });
        
        Gate::define('administrar', function(User $user) {
            return $user->is_administrador();
        });




    }
}
