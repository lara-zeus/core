@props(['label' => ''])

<div x-data="{ open: false }" @keydown.window.escape="open = false" @click.away="open = false" class="relative inline-block text-left">
    <span class="@if(!isset($icon)) rounded-md shadow-sm @else space-x-4 @endif">
        <button @click="open = !open" type="button"
                @if(isset($icon))
                    class="mt-2 text-gray-700 text-sm font-medium focus:outline-none focus:text-gray-800 focus:underline transition duration-150 ease-in-out"
                @else
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-gray-300 focus:shadow-outline-gray active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
                @endif
                id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open" aria-expanded="true">
            {{ $label }}

            @if(isset($icon))
                {{ $icon }}
            @else
                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            @endif
        </button>
    </span>

    <div x-show="open" x-cloak
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white z-50 border border-gray-200">
        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            {{ $slot }}
        </div>
    </div>
</div>
