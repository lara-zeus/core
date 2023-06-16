<?php

namespace LaraZeus\Core;

use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
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

        return parent::boot();
    }

    public function configurePackage(Package $package): void
    {
        parent::configurePackage($package);
        $package
            ->hasAssets()
            ->hasViews();
    }
}
