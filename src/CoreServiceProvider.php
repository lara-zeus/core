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
            /** @phpstan-ignore-next-line */
            return view('zeus::zeus');
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
