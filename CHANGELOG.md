# Changelog

All notable changes to `zeus` will be documented in this file

## 2.4.2 - 2023-04-24

### What's Changed

- update composer and packages by @atmonshi in https://github.com/lara-zeus/core/pull/38

### Remember to republish the assets using:

`php artisan vendor:publish --tag=zeus-assets --force`

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.1...2.4.2

## 2.4.1 - 2023-04-10

### What's Changed

- Update composer.lock by @atmonshi in https://github.com/lara-zeus/core/pull/37

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.0...2.4.1

## 2.4.0 - 2023-04-10

### What's Changed

- Bump loader-utils from 1.4.0 to 1.4.2 by @dependabot in https://github.com/lara-zeus/core/pull/29
- Bump dependabot/fetch-metadata from 1.3.5 to 1.3.6 by @dependabot in https://github.com/lara-zeus/core/pull/32
- Bump aglipanci/laravel-pint-action from 1.0.0 to 2.2.0 by @dependabot in https://github.com/lara-zeus/core/pull/34
- Bump ramsey/composer-install from 1 to 2 by @dependabot in https://github.com/lara-zeus/core/pull/30
- support laravel 10 by @atmonshi in https://github.com/lara-zeus/core/pull/36

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.3.4...2.4.0

## 2.3.4 - 2022-11-11

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.3 to 1.3.4 by @dependabot in https://github.com/lara-zeus/core/pull/26
- Bump dependabot/fetch-metadata from 1.3.4 to 1.3.5 by @dependabot in https://github.com/lara-zeus/core/pull/27
- add `prose` classes and Small updates by @atmonshi in https://github.com/lara-zeus/core/pull/28

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.3.3...2.3.4

## 2.3.3 - 2022-09-24

### What's Changed

- thunder assets and updates by @atmonshi in https://github.com/lara-zeus/core/pull/25

add features and roadmap
add zeus render hooks
list all user entries and show entry details
small changes to the UI
refactor all fields classes
improvements in all resources
use the new table layout in forms and entries
refactor filling the form component
add form status sushi model

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.3.2...2.3.3

## 2.3.2 - 2022-09-18

### What's Changed

- improve responsive layout by @atmonshi in https://github.com/lara-zeus/core/pull/24

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.3.1...2.3.2

## 2.3.1 - 2022-09-17

### What's Changed

- update composer by @atmonshi in https://github.com/lara-zeus/core/pull/23

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.3.0...2.3.1

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
