<?php

namespace LaraZeus\Core;

use Filament\Panel;
use Filament\PanelProvider;

class CoreServiceProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('zeus')
            ->path('zeus')
            ->resources([
                //
            ])
            ->pages([
                // ...
            ])
            ->widgets([
                // ...
            ])
            ->middleware([
                // ...
            ])
            ->authMiddleware([
                // ...
            ]);
    }

    protected array $styles = [
        'zeus-filament' => __DIR__ . '/../resources/dist/filament.css',
    ];

    protected array $scripts = [
        'zeus-filament' => __DIR__ . '/../resources/dist/filament.js',
    ];

    /*public static function make(): static
    {
        return app(static::class);
    }*/

    public function boot(Panel $panel): void
    {
        // let me have my fun 🤷🏽‍
        /*Blade::directive('zeus', function () {
            return '<span class="text-secondary-700 group"><span class="font-semibold text-primary-600 group-hover:text-secondary-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-secondary-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>';
        });

        return parent::boot();*/
    }

    /*public function configurePackage(Package $package): void
    {
        parent::configurePackage($package);
        $package
            ->hasAssets()
            ->hasViews();
    }*/
}
