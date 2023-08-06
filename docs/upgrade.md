---
title: Upgrade
weight: 1
---

## Upgrading Guid

the upgrading porsses is almost the same for all our packages, I'll try to list all the majeor changes. if you found any missing informations, or had a bug, please open an issue in the corresponding reposetry for the package you're using.

- [Wind](https://github.com/lara-zeus/wind)
- [Sky](https://github.com/lara-zeus/sky)
- [Bolt](https://github.com/lara-zeus/bolt)
- [Thunder](https://github.com/lara-zeus/thunder)
- [Rain](https://github.com/lara-zeus/rain)
- [Rhea](https://github.com/lara-zeus/rhea)

## Prepation

first update your filament app, after the upgrade all zeus packegs wont be active by defualt, so it's a good time to check and make sure athat your app working prefectlly after the upgrade.

### livewire model binding

enable livewire model binding in the livewire config:

`'legacy_model_binding' => true,`

## Register the plugins

```php
->plugins([
    WindPlugin::make(),
    SkyPlugin::make(),
    BoltPlugin::make(),
    RainPlugin::make(),
])
```

### supported plugins

```php
SpatieLaravelTranslatablePlugin::make()
    ->defaultLocales([config('app.locale')])
```

or if you have multi lang:

```php
SpatieLaravelTranslatablePlugin::make()
    ->defaultLocales(['en', 'es']),
```

### Zeus Plugins

## Theme and Assets

### filament Theme

create a theme if not already
in tailwind config 
add /filament/

for frontend:

/theme/

### Frontend assets

### Frontend Views

## Migrate The Configurations

now, you can delete all old config files

## publish the migration

## 
