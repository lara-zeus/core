<?php

namespace LaraZeus\Core;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CoreServiceProvider extends PackageServiceProvider
{
    public function packageBooted(): void
    {
        // let me have my fun 🤷🏽‍
        Blade::directive('zeus', function () {
            return '<span class="text-secondary-700 group"><span class="font-semibold text-primary-600 group-hover:text-secondary-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-secondary-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>';
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('zeus')
            ->hasAssets()
            ->hasViews('zeus');
    }
}
