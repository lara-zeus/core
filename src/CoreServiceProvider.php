<?php

namespace LaraZeus\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Component;
use Validator;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'zeus');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'zeus');

        // Core
        $this->macros();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('zeus/core.php'),
            ], 'zeus-config');

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/bolt'),
            ], 'zeus-lang');

            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'zeus-migrations');

            $this->publishes([
                __DIR__.'/../database/seeders' => database_path('seeders'),
            ], 'zeus-seeder');

            $this->publishes([
                __DIR__.'/../database/factories' => database_path('factories'),
            ], 'zeus-factories');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/zeus'),
                __DIR__.'/../resources/images' => public_path('vendor/zeus/images'),
            ], 'zeus-assets');

            $this->publishes([
                __DIR__.'/../resources/views/components/layouts' => resource_path('views/vendor/zeus/components/layouts'),
            ], 'zeus-views');
        }

        // Core
        Validator::extend('slug', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value);
        });

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