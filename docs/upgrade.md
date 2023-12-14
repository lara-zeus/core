---
title: Upgrade
weight: 2
---

<!-- TOC -->
* [Upgrade Guide](#upgrade-guide)
  * [Preparation](#preparation)
    * [Upgrade Filament](#upgrade-filament)
    * [Upgrade Other Plugins](#upgrade-other-plugins)
    * [Livewire Model Binding](#livewire-model-binding)
  * [Registering The Plugins](#registering-the-plugins)
    * [Supported Plugins](#supported-plugins)
    * [Zeus Plugins](#zeus-plugins)
  * [Theme and Assets](#theme-and-assets)
    * [Custom Classes:](#custom-classes)
    * [Frontend Views](#frontend-views)
  * [Migrate The Configurations](#migrate-the-configurations)
  * [Publish The Migration](#publish-the-migration)
<!-- TOC -->

# Upgrade Guide

The upgrading process is almost identical for all our packages; I'll list all the significant changes. If you found any missing information or had a bug, please open an issue in the corresponding repository for your package.

- [Wind](https://github.com/lara-zeus/wind)
- [Sky](https://github.com/lara-zeus/sky)
- [Bolt](https://github.com/lara-zeus/bolt)
- [Thunder](https://github.com/lara-zeus/thunder)
- [Rain](https://github.com/lara-zeus/rain)
- [Rhea](https://github.com/lara-zeus/rhea)
- [Artemis](https://github.com/lara-zeus/artemis)

## Preparation

### Upgrade Filament

First, update your filament app; after the upgrade, all Zeus packages won't be active by default, so it's an excellent opportunity to check and ensure that your app works perfectly after the upgrade.

### Upgrade Other Plugins

Ensure all other plugins in your app are updated for v3; check their versions and update them.

### Livewire Model Binding

Enable livewire model binding in the livewire config:

`'legacy_model_binding' => true,`

## Registering The Plugins

All Zeus plugins depend on other plugins, and you must register them all.

### Supported Plugins

```php
->plugins([
    // ...
    SpatieLaravelTranslatablePlugin::make()
        //If you don't use multi-language
        ->defaultLocales([config('app.locale')])
        // or if you have more
        ->defaultLocales(['en', 'es']),
        
    // required for 'Sky' and 'dynamic dashboard' only
    FilamentNavigation::make(),
])
```

### Zeus Plugins

Now you can register Zeus plugins as needed.

```php
->plugins([
    // ...
    WindPlugin::make(),
    SkyPlugin::make(),
    BoltPlugin::make(),
    RainPlugin::make(),
])
```

## Theme and Assets

### Custom Classes:

You need to add these files to your `tailwind.config.js` file in the `content` section.

* Core
    * frontend:
        * `./vendor/lara-zeus/core/resources/views/**/*.blade.php`

* Wind
    * filament:
        * `./vendor/lara-zeus/wind/resources/views/filament/**/*.blade.php`
        * `./vendor/lara-zeus/wind/src/Filament/Resources/LetterResource.php`
    * frontend:
        * `./vendor/lara-zeus/wind/resources/views/themes/**/*.blade.php`

* Sky
    * filament:
        * `./vendor/lara-zeus/wind/resources/views/filament/**/*.blade.php`
        * `./vendor/lara-zeus/sky/src/Models/PostStatus.php`
    * frontend:
        * `./vendor/lara-zeus/wind/resources/views/themes/**/*.blade.php`
        * `./vendor/lara-zeus/sky/src/Models/PostStatus.php`

* Bolt
    * filament:
        * `./vendor/lara-zeus/bolt/resources/views/filament/**/*.blade.php`
    * frontend:
        * `./vendor/lara-zeus/bolt/resources/views/themes/**/*.blade.php`

* Thunder
    * filament:
        * `./vendor/lara-zeus/bolt/resources/views/filament/**/*.blade.php`
    * frontend:
        * `./vendor/lara-zeus/bolt/resources/views/themes/**/*.blade.php`
        * `./vendor/lara-zeus/thunder/src/Models/TicketsStatus.php`

* Rain
    * filament:
        * `./vendor/lara-zeus/rain/resources/views/filament/**/*.blade.php`
    * frontend:
        * `./vendor/lara-zeus/rain/resources/views/themes/**/*.blade.php`
        * `./vendor/lara-zeus/rain/src/Models/Columns.php`

* Artemis
    * frontend:
        * `./vendor/lara-zeus/artemis/resources/views/**/*.blade.php`

### Frontend Views

You must publish the missing new blade files if you publish the frontend views.
Also, worth checking your published views and comparing them with the new ones; a lot has stayed the same but minor improvements.

## Migrate The Configurations

With the new filament structures, no more config files.
All the configurations can be set by your panel provider. You need to check the `Configuration.php` class for each package.

- [Wind](https://github.com/lara-zeus/wind/blob/3.x/src/Configuration.php)
- [Sky](https://github.com/lara-zeus/sky/blob/3.x/src/Configuration.php)
- [Bolt](https://github.com/lara-zeus/bolt/blob/2.x/src/Configuration.php)
- [Thunder](https://github.com/lara-zeus/thunder/blob/2.x/src/Configuration.php)
- [Rain](https://github.com/lara-zeus/rain/blob/2.x/src/Configuration.php)
- [Rhea](https://github.com/lara-zeus/rhea/blob/2.x/src/Configuration.php)

now, you can delete all old config files

## Publish The Migration

To make sure you have all migration, republish them by:

```bash 
php artisan migrate
```
