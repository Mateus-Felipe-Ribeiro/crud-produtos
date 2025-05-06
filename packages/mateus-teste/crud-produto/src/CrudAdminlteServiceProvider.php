<?php

namespace MateusTeste\CrudAdminlte;

use Illuminate\Support\ServiceProvider;

class CrudAdminlteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publica migrations
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'crud-adminlte-migrations');

        // Publica views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/crud-adminlte'),
        ], 'crud-adminlte-views');

        // Carrega rotas
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        // Carrega views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud-adminlte');
    }

    public function register()
    {
        // Registra comandos se necessário
    }
}
