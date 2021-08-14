@props(['id' => null, 'maxWidth' => null])

<x-zeus::modal.main :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 bg-gray-100">
        <div class="text-lg mb-">
            {{ $title }}
        </div>
    </div>

    <div class="px-6 py-4 bg-white">
        <div class="">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-zeus::modal.main>
