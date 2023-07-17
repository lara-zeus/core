import preset from '../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        // Core
        './resources/views/**/*.blade.php',
        // Wind
        '../wind/resources/views/filament/**/*.blade.php',
        // Rain
        '../rain/resources/views/filament/**/*.blade.php',
        // Rhea
        '../rain/resources/views/**/*.blade.php',
        // Sky
        '../sky/resources/views/filament/**/*.blade.php',
        '../sky/src/Models/PostStatus.php',
        // Bolt
        '../bolt/resources/views/filament/**/*.blade.php',
        // Thunder
        '../thunder/resources/views/**/*.blade.php',
        '../thunder/src/Models/TicketsStatus.php',
    ],
}
