<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
    public function boot(): void
    {
        // Saat pengembangan: N+1 yang tak sengaja menjadi error
        Model::preventLazyLoading(! $this->app->isProduction());

        // Tombol halaman polos (tanpa Tailwind)
        Paginator::defaultView('pagination::default');
    }
}
