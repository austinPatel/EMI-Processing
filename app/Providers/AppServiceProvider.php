<?php

namespace App\Providers;

use App\Interface\LoanDetailsInterface;
use App\Repositories\LoanDetailsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(LoanDetailsInterface::class, LoanDetailsRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
