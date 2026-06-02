<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        Passport::tokensCan([
            'manage-users' => 'Gestionar usuarios del sistema',
            'manage-roles' => 'Gestionar roles y permisos',
            'manage-courses' => 'Gestionar cursos y contenido educativo',
            'manage-blog' => 'Gestionar entradas del blog',
            'manage-portfolio' => 'Gestionar proyectos del portafolio',
        ]);
    }
}
