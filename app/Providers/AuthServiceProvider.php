<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Users;
use DB;

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
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

    // Access control for Leasing Officer 
       $gate->define('isLeasingOfficer', function($user){
            return $user->type == 'leasingOfficer';
       });

    // Access control for Finance
       $gate->define('isFinance', function($user){
            return $user->type == 'finance';
       });

    // Access control for Admin Assistant
        $gate->define('isAdminAssistant', function($user){
            return $user->type == 'adminAssistant';
        });
    
     // Access control for Maintenance
        $gate->define('isMaintenance', function($user){
            return $user->type == 'maintenance';
        });
        
        // Access control for Developer
        $gate->define('isDeveloper', function($user){
            return $user->$type == 'developer';
        });



    }
}
