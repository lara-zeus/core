<h1 align="center">Lara Zeus Core</h1>

<p align="center">
<a href="https://larazeus.com"><img src="https://larazeus.com/images/core-docs.png" /></a>
</p>

<p align="center">
<a href="https://packagist.org/packages/lara-zeus/core"><img src="https://img.shields.io/packagist/v/lara-zeus/core?style=flat-square" /></a>
<a href="https://github.styleci.io/repos/372062018?branch=main"><img src="https://github.styleci.io/repos/438676758/shield?branch=main" alt="StyleCI"></a>
<a href="https://packagist.org/packages/lara-zeus/core"><img src="https://img.shields.io/packagist/dt/lara-zeus/core?style=flat-square" /></a>
<a href="https://github.com/lara-zeus/core"><img src="https://img.shields.io/github/stars/lara-zeus/core?style=flat-square" /></a>
<a href="https://www.codefactor.io/repository/github/lara-zeus/core"><img src="https://www.codefactor.io/repository/github/lara-zeus/core/badge" alt="CodeFactor" /></a>
</p>

thia is the main UI core, and blade files for all lara-zeus packages
>small tasks can be time-consuming, let us build these for you,

## Support Filament

<a href="https://github.com/sponsors/danharrin">
<img width="320" alt="filament-logo" src="https://filamentadmin.com/images/sponsor-banner.jpg">
</a>

## why this a seperate package
we have many packages, some are already published, and more in the way.
so it make sense to seprate the assets and the defualt layots we useing in our packages.

## can I customize these views
Yes of course, you can customize the blade files, and make your own themes

#### to publish the views
```bash
php artisan vendor:publish --tag=zeus-views
```
#### to publish the assets files
```bash
php artisan vendor:publish --tag=zeus-assets
```
