<header class="bg-gradient-to-b from-white to-gray-100 mb-4">
    <div class="max-w-7xl mx-auto py-2 px-3">
        <div class="flex justify-between">
            <div class="italic font-semibold text-xl text-gray-600">
                {{ $header }}
            </div>
            @if(isset($options))
                <div>
                    {{ $options }}
                </div>
            @endif
        </div>

        @if(isset($breadcrumb))
            <div class="flex text-gray-300 text-sm group mt-2">
                <a href="#" class="mr-2">
                    <x-heroicon-o-home class="h-4 w-4 text-gray-500" />
                </a>
                {{ $breadcrumb }}
            </div>
        @endif
    </div>
</header>