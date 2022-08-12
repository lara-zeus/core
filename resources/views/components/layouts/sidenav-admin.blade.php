<div>
    @if(class_exists(LaraZeus\Wind\Wind::class))
        <x-zeus::sidenave.head>
            <x-iconpark-wind class="inline align-text-bottom text-secondary-600 text-opacity-100 h-4 w-4" />
            Wind
        </x-zeus::sidenave.head>

        <x-zeus::sidenave.item href="{{ route('wind.admin.categories') }}" :label="__('Categories')" :active="request()->routeIs('wind.admin.categories')">
            <x-slot name="icon">
                <x-heroicon-o-document-duplicate class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>
        <x-zeus::sidenave.item href="{{ route('wind.admin.letters') }}" :label="__('Letters')" :active="request()->routeIs('wind.admin.letters')">
            <x-slot name="icon">
                <x-heroicon-o-inbox class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>
    @endif
</div>