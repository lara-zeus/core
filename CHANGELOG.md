# Changelog

All notable changes to `zeus` will be documented in this file

## 2.3.0 - 2022-09-17

#### What's Changed

- improve skeleton and add tests and dark mode
- separate the CSS for frontend and filament
- update .github workflows
- add phpstan and pint
- delete unused components

### to update:

- delete the folder `public/vendor/zeus`
- publish the assets again:

```bash
php artisan vendor:publish --tag=zeus-assets

```
the same for the views, backup your changes and republish them:

```bash
php artisan vendor:publish --tag=zeus-views

```
**Full Changelog**: https://github.com/lara-zeus/core/compare/2.2.10...2.3.0

## 2.1.0 - 2022-07-10

- update the css
- update filament to 2.13

## 1.0.0 - 2022-04-19

- clean up unused assets

## 0.0.4 - 2022-03-20

- add support for laravel 8
- refactor the required packages in composer
- upgrade assets packages and include filament assets

## 0.0.3 - 2022-02-10

- support php 8 and laravel 9

## 0.0.2 - 2022-01-07

- clean up some old files

## 0.0.1 - 2021-08-14

- initial release
