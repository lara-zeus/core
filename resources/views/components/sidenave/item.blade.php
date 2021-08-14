@props([ 'label' => 'label', 'icon' => '', 'active' ])

<a {{ $attributes->merge(['class' => 'text-base group block w-full text-left py-2 px-0 cursor-pointer']) }} >
    @if(isset($icon))
        <span class="@if(($active ?? false)) text-green-700 @else text-gray-400 @endif inline group-hover:text-green-600 transition ease-in-out duration-500">
            {{ $icon }}
        </span>
    @endif
    <span class="@if(($active ?? false)) text-green-700 @else text-gray-500 @endif group-hover:text-green-600 transition ease-in-out duration-500">{{ $label }}</span>
</a>
