<?php

namespace LaraZeus\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use LaraZeus\Core\Http\Livewire\CreateCollection;
use Livewire\Component;
use Livewire\Livewire;
use Validator;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'zeus');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'bolt');

        Livewire::component('zeus.form-collection', CreateCollection::class);

        // Core
        $this->macros();

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('zeus.php'),
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
        }

        // Core
        Validator::extend('slug', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $value);
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

        // pkg port
        Builder::macro('toCsv', function () {
            $results = $this->get();

            if ($results->count() < 1) {
                return;
            }

            $titles = implode(',', array_keys((array) $results->first()->getAttributes()));

            $values = $results->map(function ($result) {
                return implode(',', collect($result->getAttributes())->map(function ($thing) {
                    return '"'.$thing.'"';
                })->toArray());
            });

            $values->prepend($titles);

            return $values->implode("\n");
        });
    }
}
