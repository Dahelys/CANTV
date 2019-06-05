<?php

namespace reporte_red_datos_cantv\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \reporte_red_datos_cantv\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \reporte_red_datos_cantv\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \reporte_red_datos_cantv\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' => \reporte_red_datos_cantv\Http\Middleware\RedirectIfAuthenticated::class,
        'admin' => \reporte_red_datos_cantv\Http\Middleware\Admin::class,
        'especialista' => \reporte_red_datos_cantv\Http\Middleware\Especialista::class,
    ];
}
