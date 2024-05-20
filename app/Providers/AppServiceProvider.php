<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        Blade::if('role', function ($role) {
            return Auth::check() && Auth::user()->hasRole($role);
        });

        Blade::if('roles', function ($roles) {
            if (!Auth::check()) {
                return false;
            }

            $userRoles = Auth::user()->roles->pluck('name')->toArray();
            return count(array_intersect($roles, $userRoles)) > 0;
        });

        Model::unguard();
    }
}
