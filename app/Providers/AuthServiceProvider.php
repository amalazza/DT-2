<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        /* define a admin user role */
        Gate::define('isAdmin', function(User $user) {
            if($user->role_id===1) {
                return true;
            }
         });
        
         /* define a manager user role */
         Gate::define('isManager', function(User $user) {
             return $user->role_id === 2;
         });
       
         /* define a user role */
         Gate::define('isUser', function(User $user) {
             return $user->role_id === 3;
         });

        Gate::define('createAnggota', function (User $user) {
            if($user->role_id===1 || $user->role_id===2 || $user->role_id===3) {
                return true;
            }
        });

        // Gate::define('create-delete-users', function (User $user) {
        //     if($user->role_id===1) {
        //         return true;
        //     }
        // });

        //
    }
}
