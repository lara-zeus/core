@extends('Backend.Layout.MasterLayout')

@section('content')
    @php
        $formsHelper        = new \App\Classes\Forms\CurrentFields\Helpers();
        $LocksPoliciesClass = new \App\Classes\LocksPolicies\LocksPolicies();
        $getFields          = $formsHelper->availableFields();
        $getFieldsMultiVal  = $getFields->where('isMultiVals', true);
    @endphp
    <div id="page-content-wrapper" class="build-forms full-width">

        <form method="POST" action="{{ $formActionUrl }}" id="formMaker" name="formMaker" class="validateForm">
            @if(!isset($isDuplicate) || $isDuplicate === false)
                @method('PUT')
            @endif
            @csrf

            <div class="row full-width-grid">
                <div class="medium-9 columns large-collapse">
                    <div class="row">
                        <div class="large-6 small-12 columns large-collapse">
                            <h2>
                                <i class="fa fa-plus"></i> {{ trans($langPath.'.editForm') }}
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

                    <div class="callout">{{ trans($langPath.'.editFormsNote') }}</div>
                    @if($LocksPoliciesClass->isLocked($LocksPolicies,'FORMS',$form->id))
                        <div class="callout alert hollow clearfix" style="padding: 3px 10px 1px 10px !important;">
                            @if(\EvoUsers::isAdmin())
                                <a id="allowEdit" onclick="allowEdit()" class="float-{{ trans('Common.left') }} alert button small">
                                    {{ trans($langPath.'.allowEdit') }}
                                </a>
                            @endif

                            <i class="fa fa-exclamation-circle fa-lg text-alert"></i>
                            {{ trans($langPath.'.someFieldsAreDisabled') }}
                            <br>
                            <strong>
                                {!! $LocksPoliciesClass->getBelongs($LocksPolicies,$form->id) !!}
                            </strong>
                        </div>
                    @endif

                    {{-- New Sections --}}
                    <div class="sortable_edit" id="allSections">

                        @if (isset($form->sections) && !empty($form->sections))
                            @foreach ($form->sections as $section)
                                @include('Backend.Forms.Edit.Section')
                            @endforeach
                        @endif

                    </div>
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
        .switch {
            margin-top: 5px !important;
            margin-bottom: -1px !important;
        }

        .sortable-placeholder {
            background-color: #fcf8e3;
            border: 1px solid #fbeed5;
            min-height: 50px;
        }

        .sort-mover, .sort-mover_edit {
            cursor: move;
        }

        .locked_item {
            border: 1px solid #ff756d;
            background: rgba(255, 220, 205, 0.90) !important;
        }

        .select2-container {
            margin-bottom: 13px;
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
        setPos();
        setFieldType();
        var fieldHTMLIsRequire = "{{ trans($langPath.'.fieldHTMLIsRequire') }}";

        $('.filedType').select2({
            width                  : "100%",
            minimumResultsForSearch: -1,
            templateResult         : formatState
        });

        $(".sortable_edit").sortable({
            placeholder: "sortable-placeholder",
            items      : '.sort-item_edit',
            handle     : ".sort-mover_edit"
        });

        @if(isset($isDuplicate) && $isDuplicate === true)
            var titleInput = $('input[name="title[ar]"]');
            var oldTitle = titleInput.val();
            var newTitle = oldTitle + ' - {{ trans($langPath.'.copy') }}';
            titleInput.val(newTitle);

            $('#uqu-loading-overlay').fadeIn();
            $('.uqu-loading-effect').fadeIn();
            $('.uqu-loading-message').fadeIn();
            $('.result-message-warpper').fadeOut();

            hideLoadingEffect('success');

            $(".result-message").html('{{ trans($langPath.'.CloningPleaseWait') }} ...');
            $('.close-button').hide();

            setTimeout(function () {
                $('#saveBtn').click();
            }, 1500);
        @endif

        $('.locked_item').attr("style", "pointer-events: none;");

        @if(\EvoUsers::isAdmin())
            function allowEdit() {
                $('.locked_item')
                    .attr("style", "pointer-events: auto; border-color: green !important; background-color: #cce8cc !important;");
                $('#allowEdit').hide();
            }
        @endif

        checkRangeType(null);

        $('.help-popover').webuiPopover({trigger: 'hover', animation: 'pop', width: 150});
    </script>
@stop
