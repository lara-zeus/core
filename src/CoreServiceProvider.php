<?php

namespace LaraZeus\Core;

use Composer\InstalledVersions;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CoreServiceProvider extends PackageServiceProvider
{
    public static string $name = 'zeus';

    public function packageBooted(): void
    {
        if (class_exists(AboutCommand::class) && class_exists(InstalledVersions::class)) {
            $packages = collect([
                'core',
                'wind',
                'sky',
                'bolt',
                'thunder',
                'rain',
                'rhea',
                'artemis',
                'hermes',
                'tyche',
            ])
                ->filter(fn (string $package): bool => InstalledVersions::isInstalled("lara-zeus/{$package}"))
                ->mapWithKeys(fn ($package) => [$package => InstalledVersions::getPrettyVersion("lara-zeus/{$package}")])
                ->toArray();

            AboutCommand::add('Zeus ', $packages);
        }
        // let me have my fun 🤷🏽‍
        Blade::directive('zeus', function () {
            return '<span class="text-custom-700 group"><span class="font-semibold text-primary-600 group-hover:text-custom-500 transition ease-in-out duration-300">Lara&nbsp;<span class="line-through italic text-custom-500 group-hover:text-primary-600 transition ease-in-out duration-300">Z</span>eus</span></span>';
        });

        FilamentAsset::register([
            Css::make('filament-lara-zeus', __DIR__ . '/../resources/dist/lara-zeus.css'),
        ], 'lara-zeus');
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasConfigFile()
            ->hasViews('zeus');
    }

    public static function setThemePath(string $path): void
    {
        $viewPath = 'zeus::themes.' . config('zeus.theme') . '.' . $path;

        $folder = resource_path('views/vendor/zeus/themes/' . config('zeus.theme') . '/' . $path);

        if (! is_dir($folder)) {
            $viewPath = 'zeus::themes.zeus.' . $path;
        }

        View::share($path . 'Theme', $viewPath);
        App::singleton($path . 'Theme', function () use ($viewPath) {
            return $viewPath;
        });
    }
}
