<?php

namespace LaraZeus\Core;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;

class CoreServiceProvider extends PluginServiceProvider
{
    public static string $name = 'zeus';

    protected array $styles = [
        'zeus-filament' => __DIR__ . '/../resources/dist/filament.css',
    ];

    protected array $scripts = [
        'zeus-filament' => __DIR__ . '/../resources/dist/filament.js',
    ];

    public function boot(): CoreServiceProvider
    {
        // let me have my fun 🤷🏽‍
        Blade::directive('zeus', function () {
            return '<span class="text-secondary-700 group"><span class="font-semibold text-primary-600 group-hover:text-secondary-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-secondary-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>';
        });

        CoreServiceProvider::setThemePath('');
        View::share('theme', 'zeus::themes.' . config('zeus.theme', 'zeus'));
        App::singleton('theme', function () {
            return 'zeus::themes.' . config('zeus.theme', 'zeus');
        });

        return parent::boot();
    }

    public function packageConfigured(Package $package): void
    {
        $package
            ->hasAssets()
            ->hasViews();
    }

    public static function setThemePath($path): void
    {
        $viewPath = 'zeus::themes.' . config('zeus-' . $path . '.theme') . '.' . $path;
        View::share($path . 'Theme', $viewPath);
        App::singleton($path . 'Theme', function () use ($viewPath) {
            return $viewPath;
        });
    }
}
