@props([
    'addOne' => false,
])

<div class="flex rounded-md shadow-sm">
    <input {{ $attributes->merge(['class' => 'w-full py-1 px-2 text-gray-700 text-sm border border-gray-300 focus:border-primary-600 focus:outline-none focus:border-primary-200 transition duration-150 ease-in-out' .
            ($addOne ? ' rounded-none rounded-l-md' : ' rounded-md')]) }}
    />
    @if ($addOne)
        <span class="inline-flex items-center px-2 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $addOne }}
        </span>
    @endif
</div>
