<?php
namespace Tipusultan\WhatsappApi;

use Illuminate\Support\ServiceProvider;

class WhatsappApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(WhatsappService::class, function ($app) {
            return new WhatsappService();
        });

        $this->mergeConfigFrom(__DIR__.'/../config/whatsapp.php', 'whatsapp');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/whatsapp.php' => config_path('whatsapp.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}
