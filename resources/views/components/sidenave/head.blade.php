<div
        {{ $attributes->merge([
                'class' => 'pt-4 font-semibold text-amber-600 text-opacity-50 text-sm leading-5 font-medium text-gray-400'
            ]) }}
>
    {{ $slot }}
</div>
