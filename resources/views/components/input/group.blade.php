@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
    'labelless' => false,
])

@if($inline)
    <div>
        <label for="{{ $for }}" class="@if($labelless) sr-only @endif flex justify-between text-base font-medium leading-5 text-primary-700">
            <span>{{ $label }}</span>
            @if(isset($labelIcon))
            <span>{{ $labelIcon }}</span>
            @endif
        </label>
        @if(isset($cite))
            <cite class="text-gray-500 text-xs">{{ $cite ?? '' }}</cite>
        @endif

        <div class="mt-1 relative rounded-md">
            @if ($error)
                <div class="mb-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mb-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif

                {{ $slot }}
        </div>
    </div>
@else
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start {{ $borderless ? '' : ' sm:border-t ' }} sm:border-gray-200 {{ $paddingless ? '' : ' sm:py-5 ' }}">
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ $label }}
            @if(isset($cite))
                <br>
                {{ $cite ?? '' }}
            @endif
        </label>

        <div class="mt-1 sm:mt-0 sm:col-span-2">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>
@endif
