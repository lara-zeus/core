@extends('Backend.Layout.MasterLayout')

@section('content')
    <div id="page-content-wrapper" class="build-forms full-width">
        <form method="POST" action="{{ \EvoCore::CPUrl("/Forms") }}" id="formMaker" name="formMaker" class="validateForm">
            @csrf

            @if(!is_array($allCats))
                <div class="row full-width">
                    <div class="small-12 columns large-collapse">
                        <div class="callout warning hollow">
                            <i class="fa fa-warning fa-lg"></i>
                            {{ trans($langPath.'.noCatsForFormsFound') }}
                            <a target="_blank" href="{{ \EvoCore::CPUrl('/Categories/create') }}">{{ trans('Crud.add') }}</a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row full-width-grid">
                <div class="medium-9 columns large-collapse">
                    @include('Backend.Forms.info')
                    <div class="row">
                        <div class="large-6 small-12 columns large-collapse">
                            <h2>
                                <i class="fa fa-plus"></i> {{ trans($langPath.'.addForm') }}
                            </h2>
                        </div>
                        <div class="large-6 small-12 columns text-{{ trans('Common.left') }} large-collapse">
                            <a onclick="ExpandAllSec(this)" class="button info small addSectionBtn" title="{{ trans($langPath.'.expandAllSection') }}">
                                <i class="fa fa-lg fa-fw fa-angle-double-up"></i>
                            </a>

                            <a onclick="addSection()" class="button info small addSectionBtn" title="{{ trans($langPath.'.addNewSection') }}">
                                <i class="fa fa-lg fa-indent"></i>
                                <span>{{ trans($langPath.'.addSection') }}</span>
                            </a>
                        </div>
                    </div>
                    {{-- New Sections --}}
                    <div id="allSections"></div>
                    {{-- New Sections --}}
                    <div class="row">
                        <div class="large-12 small-12 columns text-{{ trans('Common.left') }} large-collapse">
                            <a onclick="addSection()" class="button info small" title="{{ trans($langPath.'.addNewSection') }}">
                                <i class="fa fa-lg fa-indent"></i>
                                <span>{{ trans($langPath.'.addSection') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="medium-3 columns">
                    {{-- Form Options --}}
                    @include('Backend.Forms.formOptions')
                    {{-- Form Options --}}
                </div>
            </div>
        </form>
    </div>

    <div id="result"></div>
@stop

@section('css')
    @if(!empty($crudFields->getCssFiles()))
        {!! $crudFields->getCssFiles() !!}
    @endif
    <style>
        .switch { /* centering the switcher */
            margin-top: 5px !important;
            margin-bottom: -1px !important;
        }

        .highlight .callout { /* when adding items */
            background: #ffc !important;
        }

        .sortable-placeholder {
            background-color: #fcf8e3;
            border: 1px solid #fbeed5;
            min-height: 50px;
        }

        .sort-mover , .sort-mover_edit {
            cursor: move;
        }
    </style>
@stop

@section('js')
    @if(!empty($crudFields->getJsFiles()))
        {!! $crudFields->getJsFiles() !!}
    @endif
    @if(!empty($crudFields->getJsCodes()))
        {!! $crudFields->getJsCodes() !!}
    @endif
    <script src="{{ config('app.static') }}/vendors/evo-team/backend/JqueryUi.min.js?v={{ config('app.version') }}"></script>
    <script src="{{ config('app.static') }}/vendors/evo-team/backend/Forms.js?v={{ config('app.version') }}"></script>
    <script>
        // add defult on load for Add only
        addSection();
        $('.help-popover').webuiPopover({trigger: 'hover', animation: 'pop', width: 150});
    </script>
@stop
