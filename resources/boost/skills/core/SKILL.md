---
name: zeus-core
description: Use when installing, configuring, or customizing shared themes, layouts, SEO defaults, and assets for lara-zeus/core.
---

# Lara Zeus Core (`lara-zeus/core`)

## Overview & Requirements
`lara-zeus/core` provides shared views, layout components, frontend assets, SEO defaults, and theme resolution for all Lara Zeus packages.
- **PHP**: `^8.2` (`ext-json`)
- **Filament**: `^5.6`
- **Dependencies**: `lara-zeus/laravel-seo` (`^2.0`), `lara-zeus/spatie-translatable` (`^2.0`)

## Installation
```bash
composer require lara-zeus/core
```
`LaraZeus\Core\CoreServiceProvider` is auto-discovered; there is no Filament `Plugin` class to register.

## Configuration & Publishing
Publish only what you need to customize:
```bash
php artisan vendor:publish --tag=zeus-config
php artisan vendor:publish --tag=zeus-views
php artisan vendor:publish --tag=zeus-assets
```

Key options in `config/zeus.php`:
- `theme` (default `'zeus'`): active frontend theme name (e.g. `zeus`, or Artemis themes `breeze`, `daisy`, `another-portfolio`).
- `layout` (default `'zeus::components.app'`): Blade layout component used by Zeus Livewire pages.
- `site_title`, `site_description`, `site_color`: default metadata passed to `seo()`.
- `header_menu` (default `'main-header-menu'`): default navigation handle for header menus.

## Core Usage
Zeus packages resolve their theme views via `CoreServiceProvider::setThemePath(string $path)`:
```php
use LaraZeus\Core\CoreServiceProvider;

CoreServiceProvider::setThemePath('my-package');
// Resolves in order:
// 1. resources/views/vendor/zeus/themes/{config('zeus.theme')}/my-package
// 2. vendor/lara-zeus/artemis/resources/views/themes/{config('zeus.theme')}/my-package
// 3. zeus::themes.zeus.my-package
```
This shares `$myPackageTheme` with Blade views and registers `'my-packageTheme'` in the service container.

Use the `@zeus` Blade directive to render the branded Lara Zeus wordmark. Run `php artisan about` to inspect installed `lara-zeus/*` package versions registered by `CoreServiceProvider`.

## Common Pitfalls
- **Trying to register a Plugin**: `CorePlugin` does not exist; only `CoreServiceProvider` is used.
- **Overwriting views directly in vendor**: Always publish `--tag=zeus-views` to customize `resources/views/vendor/zeus/themes/...`.
- **Missing published assets**: Frontend Zeus pages require `zeus-assets` (and Filament assets) to be published when deploying.
