@props([
    'addOne' => false,
])

<div class="flex rounded-md shadow-sm">
    <input {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-gray-700 text-sm leading-5 bg-white border border-gray-300 focus:border-green-500 focus:outline-none focus:border-green-200 transition duration-150 ease-in-out' .
            ($addOne ? ' rounded-none rounded-l-md' : ' rounded-md')]) }}
    />
    @if ($addOne)
        <span class="inline-flex items-center px-4 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $addOne }}
        </span>
    @endif
</div>
