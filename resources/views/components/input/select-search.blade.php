@props([
    'placeholder' => null,
    'addOne' => null,
    'data' => [],
    'id' => '',
    'addOne' => '',
])

<div class="flex justify-between">
    <div x-data="select({ data: {{ $data }}, emptyOptionsMessage: 'No items match your search.', name: '{{ $id }}', placeholder: '{{ $placeholder }}', value: @entangle($attributes->wire('model')) })"
        x-init="init()"  @click.away="closeListbox()" @keydown.escape="closeListbox()" class="flex-grow cursor-pointer">
        <span class="nline-block w-full shadow-sm">
            <button x-ref="button" @click="toggleListboxVisibility()" :aria-expanded="open" aria-haspopup="listbox"
                class="{{ ($addOne ? ' rounded-none rounded-l-md' : ' rounded-md') }}
                     z-0 w-full p-2 flex justify-between text-left transition duration-150 ease-in-out bg-white border border-gray-300 cursor-default focus:outline-none focus:shadow-outline-blue focus:border-green-300 sm:text-sm sm:leading-5">

                <span x-show="! open" x-text="value in options ? options[value] : placeholder" :class="{ 'text-gray-500': ! (value in options) }" class="block truncate"></span>

                <input x-ref="search" x-show="open" x-model="search" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()" type="search" class="w-full h-full form-control focus:outline-none focus:ring-0 focus:ring-offset-0 focus:border-opacity-0 border-0 p-0 "/>

                <span class=" inset-y-0 right-10 flex items-center pr-2 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </button>
        </span>
        <div x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak class="absolute z-10 w-full p-2 mt-1 bg-white rounded-xl shadow-lg">
            <ul x-ref="listbox" @keydown.enter.stop.prevent="selectOption()" @keydown.arrow-up.prevent="focusPreviousOption()" @keydown.arrow-down.prevent="focusNextOption()" role="listbox" :aria-activedescendant="focusedOptionIndex ? name + 'Option' + focusedOptionIndex : null" tabindex="-1" class="scroll overflow-auto text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                <template x-for="(key, index) in Object.keys(options)" :key="index">
                    <li :id="name + 'Option' + focusedOptionIndex" @click="selectOption()" @mouseenter="focusedOptionIndex = index" @mouseleave="focusedOptionIndex = null" role="option" :aria-selected="focusedOptionIndex === index" class="relative text-gray-900 cursor-pointer select-none p-2 px-0 hover:text-green-500">
                        <span x-text="Object.values(options)[index]" class="block font-normal truncate hover:font-semibold"></span>
                        <span x-show="key === value" class="absolute inset-y-0 right-0 flex items-center pr-4 text-green-600">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </li>
                </template>

                <span x-show="! Object.keys(options).length" x-text="emptyOptionsMessage" class="block px-3 py-2 text-gray-900 cursor-default select-none"></span>
            </ul>
        </div>
    </div>

    @if ($addOne)
        <span class="inline-flex items-center px-2 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $addOne }}
        </span>
    @endif
</div>
