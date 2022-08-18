@props([
    'placeholder' => null,
    'addOne' => null,
])

<div class="flex">
  <select {{ $attributes->merge(['class' => 'block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none' . ($addOne ? ' rounded-none rounded-l-md' : ' rounded-md') ]) }}>
    @if ($placeholder)
        <option disabled value="">{{ $placeholder }}</option>
    @endif

    {{ $slot }}
  </select>
    @if ($addOne)
        <span class="inline-flex items-center px-2 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $addOne }}
        </span>
    @endif
</div>
