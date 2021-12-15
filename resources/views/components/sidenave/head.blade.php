<div
        {{ $attributes->merge([
                'class' => 'pt-4 font-semibold text-secondary-600 text-opacity-70 text-sm leading-5 font-medium'
            ]) }}
>
    {{ $slot }}
</div>
