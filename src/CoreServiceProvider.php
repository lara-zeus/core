<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->macros();

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

        // let me have my fun 🤷🏽‍
        Blade::directive('zeus', function ($part = null) {
            return '<span class="text-secondary-700 group"><span class="font-semibold text-primary-600 group-hover:text-secondary-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-secondary-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>'
                .($part) ?? '<span class="text-base tracking-wide text-secondary-500 ml-4">{$part}</span>';
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

    public function macros()
    {
        // Core
        Component::macro('notify', function ($message, $type = 'success') {
            $this->dispatchBrowserEvent('notify', [$message, $type]);
        });

        // Core
        Builder::macro('search', function ($columns, $search) {
            $this->where(function ($query) use ($columns, $search) {
                foreach (Arr::wrap($columns) as $column) {
                    $query->orWhere($column, 'like', '%'.$search.'%');
                }
            });
            return $this;
        });
    }

}
