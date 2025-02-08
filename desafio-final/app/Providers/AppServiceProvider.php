<?php

namespace App\Providers;

use App\Repositories\Base\IRepositoryBase;
use App\Repositories\Base\QueryBuilderRepository;
use App\Repositories\ClienteRepository\ClienteRepository;
use App\Repositories\ClienteRepository\IClienteRepository;
use App\Services\ClienteService\ClienteService;
use App\Services\ClienteService\IClienteService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Repositories
        $this->app->bind(
            IRepositoryBase::class,
            QueryBuilderRepository::class
        );
        $this->app->bind(
            IClienteRepository::class,
            ClienteRepository::class
        );
        //Repositories

        //Services
        $this->app->bind(
            IClienteService::class,
            ClienteService::class
        );
        //Services
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
