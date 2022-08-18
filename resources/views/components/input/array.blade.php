@props([
'keys',
'addAction',
'addActionParam' => null,
'itemsData',
'label' => '',
'things' => '',
'wireTo' => '',
])

<div wire:sortable="updateOrder" class="overflow-hidden">
    <div>
        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="flex justify-between flex-row-reverse">
        <button type="button" @if($addActionParam !== null) wire:click="{{ $addAction }}({{ $addActionParam }})" @else wire:click="{{ $addAction }}" @endif class="text-primary-600 text-sm mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
            </svg>
            <span class="text-xs">Add item</span>
        </button>
    </div>

    <div class="flex justify-between content-center items-center my-4 space-x-4 bg-gray-100 ">
        <div class="min-w-1 whitespace-nowrap text-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3 -ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3 -ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
            </svg>
        </div>
        @if(isset($keys))
            @foreach($keys as $key => $data)
                <div class="w-full text-sm text-gray-500  flex-grow items-center justify-center flex">
                    {{ $data['label'] ?? '' }}
                </div>
            @endforeach
        @endif
    </div>

    @foreach($itemsData as $index => $v)
        <div wire:sortable.item="{{ $index }}" wire:key="val-{{ $index }}" class=" flex justify-between flex-wrap content-center items-center my-4 space-x-4">
            <div wire:sortable.handle class="min-w-1 whitespace-nowrap text-gray-400" style="cursor: -webkit-grab; cursor: -moz-grab;">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3 -ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-3 w-3 -ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                </svg>
            </div>
            @if(isset($keys))
                @foreach($keys as $key => $data)
                    <div class="flex-grow items-center justify-center flex ">
                        <div class="w-full">
                            <x-dynamic-component :component="'zeus::'.$data['type']" wire:model="{{ $wireTo }}.{{ $index }}.{{ $key }}" id="{{ $key }}_{{ $loop->parent->iteration }}" placeholder="{{ $data['label'] }}">
                                @if($data['type'] === 'input.select')
                                    @foreach($data['selectValues'] as $selectKey => $selectValue)
                                        <option value="{{ $selectKey }}">{{ $selectValue }}</option>
                                    @endforeach
                                @endif
                            </x-dynamic-component>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="min-w-0 justify-center flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
    @endforeach
</div>
