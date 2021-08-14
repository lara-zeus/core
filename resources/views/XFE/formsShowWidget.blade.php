@php
    $formID = $formWidgetObject->position . '_' . $formWidgetObject->id;
    $crudFields = \EvoCrudFields::init('edit');
@endphp
<div id="formBody_{{ $formWidgetObject->id }}">
    <form enctype="multipart/form-data" method="POST" action="{{ \EvoCore::Url("/".$siteEmail."/App/Forms/save") }}" id="formMaker_{{ $formID }}" name="formMaker" class="validateForm formMaker_{{ $formID }}">
        @csrf
        <input type="hidden" name="form_id" value="{{ $form_id }}">
        @foreach($getForm->sections as $section)
            @foreach($section->fields as $field)
                @php $fieldRender = new App\Classes\Forms\CurrentFields\Builder($field); @endphp
                {!! $fieldRender->fieldRender($crudFields) !!}
            @endforeach
        @endforeach

        @if (\EvoUsers::isLogged() === false)
            @component('components.Captcha') @endcomponent
        @endif

        <div class="text-center">
            <button id="saveBtn" type="submit" class="button success" name="SAVE">
                <i class="fa fa-lg fa-save"></i>
                &nbsp;&nbsp;{{ trans('Common.saveBtn') }}
            </button>
        </div>
    </form>
</div>
<div id="formresult_{{ $formWidgetObject->id }}" class="hidee">
    <div class="row">
        <div class="small-12 column text-center">
            <div class="callout secondary text-{{ trans('Common.right') }}">
                <div id="callBackResult_{{ $formWidgetObject->id }}">
                    <i class="fa fa-check"></i>
                    &nbsp;
                </div>
            </div>
            @if(isset($options->showResult) && $options->showResult == 1)
                <a class="button info small" href="{{ \EvoCore::Url("/".$siteEmail."/App/Forms/Result/".$form_id) }}">
                    <i class="fa fa-lg fa-bar-chart"></i>
                    &nbsp;&nbsp;{{ trans('Frontend/App/Forms.showResult') }}
                </a>
            @endif
            <a class="button info small" href="{{ \EvoCore::Url("/".$siteEmail."/App/Forms/Show/".$form_id) }}">
                <i class="fa fa-lg fa-repeat"></i>
                &nbsp;&nbsp;{{ trans('Frontend/App/Forms.backToForm') }}
            </a>
            <br>
        </div>
    </div>
</div>
<style>
    blockquote:hover {
        border-{{ trans('Common.right') }}: .5rem solid darkgrey;
    }

    blockquote {
        padding-bottom: 3px;
    }

    .callout.primary {
        color: #e9fcfe;
        background: #4eb3bd;
    }

    .callout.secondary {
        color: #fff8e8;
        background: #c5a154;
    }
</style>
