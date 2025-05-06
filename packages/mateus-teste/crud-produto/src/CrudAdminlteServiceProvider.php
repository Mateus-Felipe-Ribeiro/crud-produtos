<?php

namespace MateusTeste\CrudAdminlte;

use Illuminate\Support\ServiceProvider;

class CrudAdminlteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (file_exists($routes = $this->getRoutesPath())) {
            $this->loadRoutesFrom($routes);
        }

        // Publica migrations
         $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
        ], 'crud-produto-migrations');

        // Carrega migrations
        //$this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // Carrega rotas
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Carrega views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'CrudCP');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/crm/categories'),
            __DIR__.'/resources/views' => resource_path('views/crm/products'),
        ]);
    }

    public function register()
    {
        // Registra comandos se necessário
    }

    protected function getRoutesPath()
    {
        return __DIR__.'/routes/web.php';
    }
}
