<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'zeus');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'zeus');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('zeus.php'),
            ], 'zeus-config');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/zeus'),
                __DIR__.'/../resources/images' => public_path('vendor/zeus/images'),
            ], 'zeus-assets');

            $this->publishes([
                __DIR__.'/../resources/views/components/layouts' => resource_path('views/vendor/zeus/components/layouts'),
            ], 'zeus-views');
        }

        Blade::directive('zeus', function ($part = null) {
            return '<span class="text-gray-700 group"><span class="font-semibold text-green-600 group-hover:text-yellow-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-yellow-500 group-hover:text-green-600 transition ease-in-out duration-300">Z</span>eus</span></span>'
                .($part) ?? '<span class="text-base tracking-wide text-gray-500 ml-4">{$part}</span>';
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'zeus');

        $this->app->singleton('core', function () {
            return new Core();
        });
    }
}