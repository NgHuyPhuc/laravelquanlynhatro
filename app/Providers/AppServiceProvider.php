<?php

namespace App\Providers;

use App\Services\NhaTroService\NhaTroService;
use Illuminate\Support\Facades\View;
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
        $this->app->bind(\App\Services\TangService\TangService::class, function ($app) {
            return new \App\Services\TangService\TangService(
                $app->make(\App\Repositories\Repository\TangRepository::class)
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
        View::composer('backend.master.layouts.sidebar', function ($view) {
            // Lấy instance của NhaTroService từ container
            $nhatroService = $this->app->make(NhaTroService::class);
            
            // Gọi phương thức getall để lấy dữ liệu
            $nhatroData = $nhatroService->getall();

            // Truyền dữ liệu vào view
            $view->with('nhatroData', $nhatroData);
        });
    }
}
