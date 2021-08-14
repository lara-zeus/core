@props([
'preAddOne' => false,
])

<div class="">
    @if ($preAddOne)
        <span class="inline-flex p-2 bg-gray-200 items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $preAddOne }}
        </span>
    @endif
    <input {{ $attributes->merge(['class' => 'p-2 text-gray-800 text-sm border-b border-gray-300 bg-transparent dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-green-500 dark:focus:border-green-500 focus:outline-none focus:border-green-200 transition duration-150 ease-in-out' .
            ($preAddOne ? ' rounded-none rounded-r-md' : ' rounded-md')]) }}
    />
</div>
