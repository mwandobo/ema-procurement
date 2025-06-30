<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\SystemModule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Schema;

class PermissionServiceProvider extends ServiceProvider
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


        if (Schema::hasTable('permissions')) {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        }

        if (Schema::hasTable('sys_modules')) {
            SystemModule::get()->map(function ($module) {
                Gate::define($module->slug, function ($user) use ($module) {
                    return $user->hasModuleTo($module);
                });
            });
        }


        // Module


    }
}
