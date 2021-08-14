@extends('Backend.Layout.MasterLayout')

@section('content')
    @php
        $crudFields = \EvoCrudFields::init('edit');
        $ava = (new \App\Classes\Forms\CurrentFields\Helpers())->availableFields()->where('pinable', true)->pluck('type')->toArray();
        $transAva = array_map(function ($type) {
            return trans('Backend/App/Forms.filedType' . ucfirst($type));
        }, $ava);

    @endphp
    <div id="page-content-wrapper">
        <div class="callout">
            <h3>{{ trans($langPath . '.supportPinFields') }}:</h3>
            <ul>
                @foreach($transAva as $type)
                    <li><strong>{{ $type }}</strong></li>
                @endforeach
            </ul>
        </div>

        <form method="POST" action="{{ \EvoCore::CPUrl("/Forms/PinMaker") }}" id="pinForm" class="validateForm">
            @csrf

            <div class="box-wrapper withShadow">
                <div class="box-header full-width">
                    <h2 class="text-secondary">{{ trans($langPath . '.pinMaker') }}</h2>
                </div>

                <div class="box-content">
                    <div class="row">
                        <div class="large-8 columns large-centered">
                            @foreach($form->fields as $field)
                                @if(in_array($field->type,$ava))
                                    @php $options = json_decode($field->options); @endphp
                                    <label>{{ $field->crudPhrase->value ?? '' }}</label>
                                    {!! (new App\Classes\Forms\CurrentFields\Builder($field))->fieldRender($crudFields,[],null) !!}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="box-footer text-center">
                    <button class="button success">{{ trans($langPath . '.pinMaker') }}</button>
                    <div id="result"></div>
                </div>
            </div>
            <input name="form_id" type="hidden" value="{{ $id }}">
        </form>
        <form id="dummy" method="POST" action="" class="validateForm"></form>
    </div>
@stop

@section('css')
    @if(!empty($crudFields->getCssFiles()))
        {!! $crudFields->getCssFiles() !!}
    @endif
@stop

@section('js')
    @if(!empty($crudFields->getJsFiles()))
        {!! $crudFields->getJsFiles() !!}
    @endif
    @if(!empty($crudFields->getJsCodes()))
        {!! $crudFields->getJsCodes() !!}
    @endif
    <script>
        var formMaker = $('#dummy');
        var formIDForDraft = "forms_{{ $form->id }}";
        var isPreview = true;

        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i:s'
        });

        $("#pinForm").on("submit", function (e) {
            e.preventDefault();

            $.ajax({
                type : "post",
                url  : $(this).attr('action'),
                data : $(this).serialize(),
                cache: false
            }).done(function (data) {
                $('#result').html(data);
                /*if (data['status'] == 1) {
                 $('.close-button').hide();
                 setTimeout(function () {
                 window.location.replace("");
                 }, 1000);
                 }*/
            });

            return false;
        });
    </script>
    <script src="{{ config('app.static') }}/vendors/evo-team/common/CopyToClipboard.js?v={{ config('app.version') }}"></script>
    <script src="{{ config('app.static') }}/vendors/evo-team/frontend/showForm.js?v={{ config('app.version') }}"></script>

@stop
