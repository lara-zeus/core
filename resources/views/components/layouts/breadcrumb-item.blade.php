@props(['url', 'label'])

<div>
    <div class="inline-flex items-center">
        <a
            @if(isset($url)) href="{{ $url }}" @endif
            class=" @if(isset($url)) text-gray-400 group-hover:text-gray-500 @else text-primary-600 group-hover:text-primary-800 @endif transition ease-in-out duration-500"
        >
            {{ $label }}
        </a>
        @if(isset($url))
            <span class="px-2">
                <x-heroicon-o-chevron-right class="h-4 w-4" />
            </span>
        @endif
    </div>
</div>
