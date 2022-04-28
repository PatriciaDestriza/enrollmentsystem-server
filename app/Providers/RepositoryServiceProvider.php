<?php

namespace App\Providers;

use App\Repositories\AcademicTerm\AcademicTermRepository;
use App\Repositories\AcademicTerm\AcademicTermRepositoryInterface;
use App\Repositories\AcademicYear\AcademicYearInterface;
use App\Repositories\AcademicYear\AcademicYearRepository;
use App\Repositories\AcademicYear\AcademicYearRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AcademicYearRepositoryInterface::class, AcademicYearRepository::class);
        $this->app->bind(AcademicTermRepositoryInterface::class, AcademicTermRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
