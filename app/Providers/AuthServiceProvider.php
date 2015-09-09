<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('produce', function ($user) {
  return $user->role === "قسم الإنتاج";
});
        $gate->define('maintain', function ($user) {
  return $user->role === "قسم الصيانة";
});
        $gate->define('manage', function ($user) {
  return $user->role === "مدير";
});
        $gate->define('admin', function ($user) {
  return $user->role === "مشرف";
});

        //
    }
}
