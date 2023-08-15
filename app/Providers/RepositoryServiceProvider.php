<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Repositories\Sections\SectionRepository;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repositories\Doctors\DoctorRepository;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repositories\Services\SingleServiceRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
