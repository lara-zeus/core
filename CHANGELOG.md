# Changelog

All notable changes to `zeus` will be documented in this file

## 2.4.18 - 2023-06-30

### What's Changed

- update dependencies and assets by @atmonshi in https://github.com/lara-zeus/core/pull/56

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.17...2.4.18

## 2.4.17 - 2023-06-24

### What's Changed

- update for assets and composer by @atmonshi in https://github.com/lara-zeus/core/pull/55

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.16...2.4.17

## 2.4.16 - 2023-06-19

### What's Changed

- Fix primary color by @atmonshi in https://github.com/lara-zeus/core/pull/54

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.15...2.4.16

## 2.4.15 - 2023-06-17

### What's Changed

- update assets to rain by @atmonshi in https://github.com/lara-zeus/core/pull/53

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.14...2.4.15

## 2.4.14 - 2023-06-16

### What's Changed

- Fix core by @atmonshi in https://github.com/lara-zeus/core/pull/52

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.13...2.4.14

## 2.4.13 - 2023-06-16

### What's Changed

- Update assets and compile for prod, composer update by @atmonshi in https://github.com/lara-zeus/core/pull/51

always add the following to your composer `post-update-cmd` to ensure your assets up-to-date:

`"@php artisan vendor:publish --tag=zeus-assets --ansi --force"`

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.12...2.4.13

## 2.4.12 - 2023-06-16

### What's Changed

- update css by @atmonshi in https://github.com/lara-zeus/core/pull/50

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.11...2.4.12

## 2.4.11 - 2023-06-16

### What's Changed

- update to rain by @atmonshi in https://github.com/lara-zeus/core/pull/49
- Update the CSS to include some classes for our newest package [Zeus Rain](https://github.com/lara-zeus/rain)

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.10...2.4.11

## 2.4.10 - 2023-06-13

### What's Changed

- update composer by @atmonshi in https://github.com/lara-zeus/core/pull/48

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.9...2.4.10

## 2.4.9 - 2023-06-12

### What's Changed

- update assets and composer by @atmonshi in https://github.com/lara-zeus/core/pull/47

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.8...2.4.9

## 2.4.8 - 2023-06-06

### What's Changed

- recompile assets and composer update by @atmonshi in https://github.com/lara-zeus/core/pull/46

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.7...2.4.8

## 2.4.7 - 2023-06-04

### What's Changed

- small improvements by @atmonshi in https://github.com/lara-zeus/core/pull/45

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.6...2.4.7

## 2.4.6 - 2023-06-02

### What's Changed

- Bump dependabot/fetch-metadata from 1.4.0 to 1.5.1 by @dependabot in https://github.com/lara-zeus/core/pull/43
- Bump aglipanci/laravel-pint-action from 2.2.0 to 2.3.0 by @dependabot in https://github.com/lara-zeus/core/pull/44
- composer and assets update

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.5...2.4.6

## 2.4.5 - 2023-05-28

### What's Changed

🔥 Adding `Filament Plugin Purge` for better and thinner CSS file.
🚩 The component `<x-zeus::box>` is retired, and now we using `<x-filament::card>` instead.
🟢 Always add `@php artisan vendor:publish --tag=zeus-assets --ansi --force` to `post-update-cmd` in your composer file.

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.4...2.4.5

## 2.4.4 - 2023-05-28

### What's Changed

- remove unused route link by @atmonshi in https://github.com/lara-zeus/core/pull/41

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.3...2.4.4

## 2.4.3 - 2023-05-20

### What's Changed

- Bump dependabot/fetch-metadata from 1.3.6 to 1.4.0 by @dependabot in https://github.com/lara-zeus/core/pull/39
- composer update by @atmonshi in https://github.com/lara-zeus/core/pull/40

**Full Changelog**: https://github.com/lara-zeus/core/compare/2.4.2...2.4.3

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
