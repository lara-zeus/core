<div>
    @if(class_exists(LaraZeus\Bolt\Bolt::class))
        <x-zeus::sidenave.head>
            <x-iconpark-lightning-o class="inline align-text-bottom text-secondary-600 text-opacity-100 h-4 w-4" />
            Bolt
        </x-zeus::sidenave.head>

        <x-zeus::sidenave.item href="{{ route('bolt.admin.form.create') }}" :label="__('Create New Form')" :active="request()->routeIs('bolt.admin.form.create')">
            <x-slot name="icon">
                <x-heroicon-o-folder-add class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>

        <x-zeus::sidenave.item href="{{ route('bolt.admin.list') }}" :label="__('Forms')" :active="request()->routeIs('bolt.admin.list')">
            <x-slot name="icon">
                <x-heroicon-o-collection class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>
        <x-zeus::sidenave.item href="{{ route('bolt.admin.collections') }}" :label="__('Collections')" :active="request()->routeIs('bolt.admin.collections')">
            <x-slot name="icon">
                <x-heroicon-o-database class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>
        <x-zeus::sidenave.item href="{{ route('bolt.admin.manageEntries') }}" :label="__('Entries')" :active="request()->routeIs('bolt.admin.manageEntries')">
            <x-slot name="icon">
                <x-heroicon-o-clipboard-list class="inline align-text-bottom h-5 w-5" />
            </x-slot>
        </x-zeus::sidenave.item>
    @endif

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