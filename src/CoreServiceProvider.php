<?php

namespace LaraZeus\Core;

use Filament\PluginServiceProvider;
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

    public function configurePackage(Package $package): void
    {
        parent::configurePackage($package);
        $package->hasAssets();
    }
}
