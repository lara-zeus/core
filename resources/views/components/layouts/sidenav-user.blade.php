<div>
    <x-zeus::sidenave.item href="{{ route('bolt.user.list') }}" :label="__('Forms')" :active="request()->routeIs('bolt.user.list')">
        <x-slot name="icon">
            <x-heroicon-o-home class="inline align-text-bottom h-5 w-5" />
        </x-slot>
    </x-zeus::sidenave.item>

    <x-zeus::sidenave.item href="{{ route('bolt.user.entries.list') }}" :label="__('My Entries')" :active="request()->routeIs('bolt.user.entries.list')">
        <x-slot name="icon">
            <x-heroicon-o-home class="inline align-text-bottom h-5 w-5" />
        </x-slot>
    </x-zeus::sidenave.item>
</div>