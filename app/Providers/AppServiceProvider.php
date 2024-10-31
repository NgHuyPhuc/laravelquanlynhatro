<?php

namespace App\Providers;

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
        // $this->app->bind(\App\Services\Admin\UserAdminService::class, function ($app) {
        //     return new \App\Services\Admin\UserAdminService(
        //         $app->make(\App\Repositories\Repository\UserRepository::class)
        //     );
        // });
        $this->app->bind(\App\Services\NhaTroService\NhaTroService::class, function ($app) {
            return new \App\Services\NhaTroService\NhaTroService(
                $app->make(\App\Repositories\Repository\NhaTroRepository::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
