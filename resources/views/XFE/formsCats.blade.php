<x-zeus::layout.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-zeus::layout.box>
        <div class="small-12 columns">
            <?php
            $perRow = 3;
            $counter = 1;
            $totalCats = count($defiedCats);
            ?>
            @foreach($categories as $cat )
                @if(in_array($cat->id, $defiedCats))
                    @if($counter % $perRow == 1) <div class="row"> @endif
                        <div class="large-4 medium-6 small-12 columns @if($counter == $totalCats) end @endif">
                            <div class="box-wrapper withShadow">
                                <div class="box-header">
                                    <h4>{{ $cat->name ?? '' }}</h4>
                                </div>
                                <div class="box-content">
                                    <ul class="no-bullet hover-list">
                                        @foreach($forms as $form )
                                            @if($cat->id == $form->category_id)
                                                <li class="bord p-4">
                                                    <a class="text-green-600" href="{{ route('showForm', ['slug' => $form->slug]) }}">
                                                        <i class="fa fa-angle-double-{{ trans('Common.left') }}"></i>
                                                        {{ $form->name ?? '' }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if($counter % $perRow == 0 || $counter >= $totalCats) </div> @endif
                    <?php $counter++; ?>
                @endif
            @endforeach
        </div>
    </x-zeus::layout.box>
</x-zeus::layout.app>
