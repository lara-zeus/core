<div class="sort-item Fld_{{ $id }}" style="padding: 0 50px 0 20px; !important;" id="Fld_{{ $fieldID }}">
    {!! $crudFields->get('fieldId['.$id.'][]') !!}

    <div class="callout hollow boxShadow" style="padding: 5px 10px 5px 10px;">

        {{--ID and Actions and Html Name--}}
        <div class="row">
            <div class="small-2 columns field-id">
                <span> {{ trans($langPath.'.filed') }} # {{ $fieldID }} ,</span>
            </div>
            <div class="small-6 columns">
                <div class="editInPlace">
                    <div title="{{ trans($langPath.'.editHtmlId') }}">
                        <div class="small-6 columns editThis">
                            (
                            <small>
                                <span class="outVal">{{ $fieldHtmlID }}</span>
                            </small>
                            )
                            <a onclick="editBtn(this)" class="editBtn fa fa-pencil-square"></a>
                        </div>
                        <div class="small-6 columns editOpen hidee">
                            {!! $crudFields->get('field[htmlId]['.$id.']['.$fieldID.']') !!}
                            <a onclick="saveBtn(this)" class="saveBtn fa fa-check-square"></a>
                        </div>
                    </div>
                    <div title="{{ trans($langPath.'.editHtmlName') }}">
                        <div class="small-6 columns editThis">
                            (
                            <small>
                                <span class="outVal">{{ $fieldHtmlName }}</span>
                            </small>
                            )
                            <a onclick="editBtn(this)" class="editBtn fa fa-pencil-square"></a>
                        </div>
                        <div class="small-6 columns editOpen hidee">
                            {!! $crudFields->get('field[htmlName]['.$id.']['.$fieldID.']') !!}
                            <a onclick="saveBtn(this)" class="saveBtn fa fa-check-square"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="small-4 columns">
                <a onclick="deleteField(this)" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteField') }}">
                    <i class="fa fa-lg fa-fw fa-close"></i>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="doExpandField(this)" class="expandField float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandSection') }}">
                    <i class="fa fa-lg fa-fw fa-chevron-up"></i>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" class="sort-mover float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                    <i class="fa fa-lg fa-fw fa-arrows"></i>
                </a>
            </div>
        </div>

        <div class="row expandFieldContent">
            <hr>
            <div class="columns small-6">
                {!! $crudFields->get('field[name]['.$id.']['.$fieldID.']') !!}
                <br>
                {!! $crudFields->get('field[desc]['.$id.']['.$fieldID.']') !!}
            </div>
            <div class="columns small-6">

                {{--Field types--}}
                <div class="row">
                    <div class="small-12 columns">
                        @php
                            $formsHelper = new \App\Classes\Forms\CurrentFields\Helpers();
                            $getFields = $formsHelper->availableFields();
                            if(!\EvoUsers::isAdmin()){
                                $getFields = $getFields->reject(function($value) {
                                    return $value['type'] === 'VCF';
                                });
                            }
                            $getFieldsOptions = $getFields->where('options', '!=', null); //->unique('options');
                        @endphp
                        <label for="field[type][{{ $id }}][{{ $fieldID }}]" data-uqu-required>{{ trans($langPath.'.filedType') }}</label>
                        <select onchange="setTypeOpt('{{ $fieldID }}',this)" class="filedType filedType_{{ $fieldID }}" name="field[type][{{ $id }}][{{ $fieldID }}]" id="field[type][{{ $id }}][{{ $fieldID }}]">
                            <option value="">{{ trans('Crud.selecteOption') }}</option>
                            @foreach($getFields as $setField)
                                <option
                                    data-icon="{{ $setField['icon'] }}"
                                    @if(!is_null($setField['options']))  data-shown="{{ $setField['options'] }}_{{ $fieldID }}" @endif
                                    value="{{ $setField['type'] }}"
                                >{{ trans($langPath.'.'.$setField['title']) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>

                {{--isRequire + position--}}
                <div class="row">
                    <div class="large-4 small-12 columns fieldPosition hidee">
                        <label for="field[position][{{ $id }}][{{ $fieldID }}]" data-uqu-required>{{ trans($langPath.'.position') }}</label>
                        {!! $crudFields->get('field[position]['.$id.']['.$fieldID.']') !!}
                    </div>
                    <div class="large-4 small-12 columns">
                        <label>{{ trans($langPath.'.isFieldRequire') }}</label>
                        {!! $crudFields->get('field[isRequire]['.$id.']['.$fieldID.']') !!}
                    </div>
                    <div class="large-4 small-12 columns forSystemType">
                        <label>{{ trans($langPath.'.fieldShowInList') }}</label>
                        {!! $crudFields->get('field[showInList]['.$id.']['.$fieldID.']') !!}
                    </div>
                    <div class="large-4 small-12 columns hidee" id="horizontal_{{ $fieldID }}">
                        <label>{{ trans($langPath.'.fieldHorizontal') }}</label>
                        {!! $crudFields->get('field[horizontal]['.$id.']['.$fieldID.']') !!}
                    </div>
                    {{--<div class="large-4 medium-4 small-12 columns hidee" id="correctAnswer_{{ $fieldID }}">
                        <label>{{ trans($langPath.'.fieldCorrectAnswer') }}</label>
                        {!! $crudFields->get('field[correctAnswer]['.$id.']['.$fieldID.']') !!}
                    </div>--}}
                </div>

                {{--Field Options--}}
                <div class="row">
                    @foreach($getFieldsOptions as $fieldOptions)
                        <div class="small-12 columns hidee fieldsOpt_{{ $fieldID }} {{ $fieldOptions['options'] }}_{{ $fieldID }}">
                            @includeif('Backend.Forms.fieldsOptions.'.$fieldOptions['options'],['tysdsdpe'=>$fieldOptions['type']])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="hidee check-radio-select multiVal_{{ $fieldID }}">
            @includeif('Backend.Forms.fieldsOptions.multiValues')
        </div>

    </div>

    <script>
        var fieldHTMLIsRequire = "{{ trans($langPath.'.fieldHTMLIsRequire') }}";
        setLangTabFocus();

        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var icon = $(state.element).data('icon');
            var $state = $(
                '<span><i class="fa ' + icon + '"></i>&nbsp;&nbsp;' + state.text + '</span>'
            );
            return $state;
        }

        $('.filedType').select2({
            width                  : "100%",
            minimumResultsForSearch: -1,
            templateResult         : formatState
        });
    </script>
</div>
