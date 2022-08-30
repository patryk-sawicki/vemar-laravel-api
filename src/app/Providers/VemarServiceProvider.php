<?php

namespace PatrykSawicki\VemarApi\app\Providers;

use Illuminate\Support\ServiceProvider;
class VemarServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot(): void
    {
        $path = realpath($raw = __DIR__ . '/../../');

//        include $path . '/routes/web.php';

        if(!file_exists($this->app->databasePath() . '/config/vemar.php'))
            $this->publishes([$path . '/config/vemar.php' => config_path('vemar.php')], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $path = realpath($raw = __DIR__ . '/../../');
        $this->mergeConfigFrom($path . '/config/vemar.php', 'vemar');
    }
}
