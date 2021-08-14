<x-zeus::layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cant see the form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                <div id="page-content-wrapper" class="build-forms">
                    <div class="small-12 columns">
                        <h1 id="page-title">
                            {{ $form->name ?? '' }}
                        </h1>
                        <p>{{ $form->desc ?? '' }}</p>
                        <hr>

                        <div class="callout alert">
                            <h3>
                                <i class="fa fa-exclamation-triangle"></i> {{ trans('Frontend/App/Forms.cantApplyNow') }}!
                            </h3>
                            <p>{{ trans('Frontend/App/Forms.msg_'.$type) }}</p>
                        </div>
                        <h4>{{ trans('Frontend/App/Forms.allowed_dates_desc') }}:</h4>

                        <div class="row">
                            <div class="column small-12 medium-6">
                                <div class="atom">
                                    <p class="atom-protons">
                                        <i class="fa fa-calendar"></i>{{ trans('Frontend/App/Forms.from') }}
                                    </p>
                                    <p class="atom-nucleus">@datetime($form->start_date)</p>
                                </div>
                            </div>
                            <div class="column small-12 medium-6">
                                <div class="atom">
                                    <p class="atom-protons">
                                        <i class="fa fa-calendar"></i>{{ trans('Frontend/App/Forms.to') }}
                                    </p>
                                    <p class="atom-nucleus">@datetime($form->end_date)</p>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="column small-12 medium-6">
                                <div class="atom">
                                    <p class="atom-protons">
                                        <i class="fa fa-eye"></i>{{ trans('Frontend/App/Forms.acl') }}
                                    </p>
                                    <p class="atom-nucleus">
                                        {{ $form->acls->crudPhrase->value ?? '' }}
                                    </p>
                                </div>

                            </div>
                            <div class="column small-12 medium-6">
                                <div class="atom">
                                    <p class="atom-protons">
                                        <i class="fa fa-flag"></i>{{ trans('Frontend/App/Forms.status') }}
                                    </p>
                                    <p class="atom-nucleus">
                                        {{ $form->status_desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @if(isset($form->detail) && !empty($form->detail))
                            <div class="callout hollow">{!! $form->desc !!}</div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-zeus::layout>
