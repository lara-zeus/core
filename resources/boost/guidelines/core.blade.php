## Lara Zeus Core (`lara-zeus/core`)

Lara Zeus Core is the shared foundation package for Lara Zeus plugins (`bolt`, `sky`, `wind`, `dynamic-dashboard`, etc.), providing the base `zeus` configuration, frontend layout component (`zeus::components.app`), shared CSS/JS Filament assets, theme path resolution, and the `@zeus` Blade directive.

### Key Classes & Assets
- Service provider: `LaraZeus\Core\CoreServiceProvider` (package name: `zeus`)
- Theme helper: `LaraZeus\Core\CoreServiceProvider::setThemePath(string $path)` — resolves views from `resources/views/vendor/zeus/themes/{theme}/{path}`, falling back to `lara-zeus/artemis`, then `zeus::themes.zeus.{path}`, and binds `{path}Theme` into the container/views.
- Config file: `config/zeus.php` (`theme`, `layout`, `site_title`, `site_description`, `site_color`, `header_menu`)
- Registered Filament assets (`lara-zeus`): `filament-lara-zeus` CSS and JS.

### Rules & Anti-Patterns
- Do not hardcode theme view paths when integrating with Zeus packages; rely on `CoreServiceProvider::setThemePath()` and `app('{package}Theme')`.
- Publish `zeus-views` or `zeus-config` instead of editing files inside `vendor/lara-zeus/core`.
- Do not register a Filament `Plugin` class for `lara-zeus/core` — it has no `Plugin` class and auto-discovers via `CoreServiceProvider`.
