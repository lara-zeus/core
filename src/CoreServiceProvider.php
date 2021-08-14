<?php

namespace LaraZeus\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
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

        // Core
        $this->macros();

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
