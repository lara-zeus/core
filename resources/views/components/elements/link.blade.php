<a x-data x-init="tippy('[data-tippy-content]', {animation: 'perspective',});"
    {{ $attributes->merge([
        'class' => 'inline-flex cursor-pointer text-gray-700 text-sm leading-5 font-medium focus:outline-none focus:text-gray-800 transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
    ]) }}
>
    {{ $slot }}
</a>
