<div class="NewField sort-item_edit" id="Fld_{{ $fieldID }}" style="padding: 0 50px 0 20px; !important;">

    <input type="hidden" value="EDIT" name="field[fieldAction][{{ $secID }}][{{ $fieldID }}]" id="field[type][{{ $secID }}][{{ $fieldID }}]">
    {!! $$crudFieldsField->get('fieldId['.$secID.']['.$fieldID.']') !!}

    <div class="callout hollow boxShadow @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID)) locked_container @endif" style="padding: 5px 10px 5px 10px;">

        @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID))
            <div class="callout alert hollow" style="padding: 3px 10px 1px 10px !important;">
                <i class="fa fa-exclamation-circle fa-lg text-alert"></i>
                {{ trans($langPath.'.someFieldsAreDisabled') }}<br>
                <strong>
                    {!! $LocksPoliciesClass->getBelongs($LocksPolicies,$fieldID) !!}
                </strong>
            </div>
        @endif

        {{--ID and Actions and Html Name--}}
        <div class="row">
            <div class="small-2 columns field-id">
                <span class="text-small">{{ trans($langPath.'.filed') }} # {{ $fieldID }} ,</span>
            </div>
            <div class="small-6 columns">
                <div class="row">
                    <div class="small-6 columns @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'htmlName')) locked_item @endif" title="{{ trans($langPath.'.editHtmlId') }}">
                        <div class="row">
                            <div class="small-6 columns editThis">
                                <?php $fieldHtmlCode = 'fieldHtmlID' . $fieldID ?>
                                (
                                <small>
                                    <span class="outVal">{{ $$fieldHtmlCode }}</span>
                                </small>
                                )
                                <a onclick="editBtn(this)" class="editBtn fa fa-pencil-square"></a>
                            </div>
                            <div class="small-6 columns editOpen hidee">
                                {!! $$crudFieldsField->get('field[htmlId]['.$secID.']['.$fieldID.']') !!}
                                <a onclick="saveBtn(this)" class="saveBtn fa fa-check-square"></a>
                            </div>
                        </div>
                    </div>
                    <div class="small-6 columns @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'htmlId')) locked_item @endif" title="{{ trans($langPath.'.editHtmlName') }}">
                        <div class="row">
                            <div class="small-6 columns editThis">
                                <?php $fieldHtmlName = 'fieldHtmlName' . $fieldID ?>
                                @if(empty($$fieldHtmlName))
                                    (
                                    <small>
                                        <span class="outVal">{{ $$fieldHtmlCode }}</span>
                                    </small>)
                                @else
                                    (<small><span class="outVal">{{ $$fieldHtmlName }}</span></small>)
                                @endif
                                <a onclick="editBtn(this)" class="editBtn fa fa-pencil-square"></a>
                            </div>
                            <div class="small-6 columns editOpen hidee">
                                {!! $$crudFieldsField->get('field[htmlName]['.$secID.']['.$fieldID.']') !!}
                                <a onclick="saveBtn(this)" class="saveBtn fa fa-check-square"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-4 columns">
                <a onclick="deleteField(this,{{ $fieldID }}, {{ $id }})" class="@if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'delete')) locked_item @endif float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteField') }}">
                    <span class="fa fa-close fa-lg"></span>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="doExpandField(this)" class="expandField float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandSection') }}">
                    <i class="fa fa-lg fa-fw fa-chevron-up"></i>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" class="sort-mover_edit float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                    <i class="fa fa-lg fa-fw fa-arrows"></i>
                </a>
            </div>
        </div>

        <h4 class="text-small text-info">
            {{ trans($langPath.'.fieldName') }} :
            {{ $field->crudPhrase->value ?? '' }}
        </h4>

        <div class="row expandFieldContent">
            <hr>
            <div class="columns small-6">
                {!! $$crudFieldsField->get('field[name]['.$secID.']['.$fieldID.']') !!}
                <br>
                {!! $$crudFieldsField->get('field[desc]['.$secID.']['.$fieldID.']') !!}
            </div>

            <div class="@if($field->type === 'VCF') locked_item @endif columns small-6">
                {{--Field types--}}
                <div class="row @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'type')) locked_item @endif">
                    <div style="padding: 7px;" class="columns small-12">
                        <label for="field[type][{{ $secID }}][{{ $fieldID }}]" data-uqu-required>{{ trans($langPath.'.filedType') }}</label>
                        <select onchange="setTypeOpt('{{ $fieldID }}',this)" class="filedType filedType_{{ $fieldID }}" name="field[type][{{ $secID }}][{{ $fieldID }}]" id="field[type][{{ $secID }}][{{ $fieldID }}]">
                            @foreach($getFields as $setField)
                                <option
                                    @if($field->type == $setField['type']) selected @endif
                                data-icon="{{ $setField['icon'] }}"
                                    @if(!is_null($setField['options']))  data-shown="{{ $setField['options'] }}_{{ $fieldID }}" @endif
                                    value="{{ $setField['type'] }}"
                                >
                                    {{ trans($langPath.'.'.$setField['title']) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--isRequire + position--}}
                <div class="row">
                    <div class="columns large-4 medium-4 small-12 fieldPosition hidee @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'position')) locked_item @endif">
                        <label for="field[position][{{ $secID }}][{{ $fieldID }}]" data-uqu-required>{{ trans($langPath.'.position') }}</label>
                        {!! $$crudFieldsField->get('field[position]['.$secID.']['.$fieldID.']') !!}
                    </div>
                    <div class="columns large-4 medium-4 small-12 @if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'isRequire')) locked_item @endif">
                        <label>{{ trans($langPath.'.isFieldRequire') }}</label>
                        {!! $$crudFieldsField->get('field[isRequire]['.$secID.']['.$fieldID.']') !!}
                    </div>
                    <div class="columns large-4 medium-4 small-12 forSystemType">
                        <label>{{ trans($langPath.'.fieldShowInList') }}</label>
                        {!! $$crudFieldsField->get('field[showInList]['.$secID.']['.$fieldID.']') !!}
                    </div>
                    <div class="columns large-4 medium-4 small-12 @if (!in_array($field->type, ['radio', 'checkbox', 'range'], true)) hidee @endif" id="horizontal_{{ $fieldID }}">
                        <label>{{ trans($langPath.'.fieldHorizontal') }}</label>
                        {!! $$crudFieldsField->get('field[horizontal]['.$secID.']['.$fieldID.']') !!}
                    </div>
                    {{--<div class="columns large-3 medium-4 small-12 @if (!in_array($field->type, $fieldsWithCorrectAnswer, true)) hidee @endif" id="correctAnswer_{{ $fieldID }}">
                        <label>{{ trans($langPath.'.fieldCorrectAnswer') }}</label>
                        {!! $$crudFieldsField->get('field[correctAnswer]['.$secID.']['.$fieldID.']') !!}
                    </div>--}}
                </div>
                {{--Field Options--}}
                <div class="row">
                    <div class="columns small-12">
                        @foreach($getFields as $fieldOptions)
                            <?php
                            $optionsClass = ($fieldOptions['type'] == $field->type) ? '' : 'hidee';
                            ?>
                            <div class="{{ $optionsClass }} fieldsOpt_{{ $fieldID }} {{ $fieldOptions['options'] ?? '' }}_{{ $fieldID }}">
                                @includeif('Backend.Forms.fieldsOptions.'.$fieldOptions['options'])
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
            </div>

            <div class="column small-12">
                <?php
                $showMultiVal = (!$getFieldsMultiVal->where('type', $field->type)->isEmpty()) ? '' : 'hidee';
                ?>
                <div class="@if($LocksPoliciesClass->isLocked($LocksPolicies,'FIELDS',$fieldID,'values')) locked_item @endif {{ $showMultiVal }} check-radio-select multiVal_{{ $fieldID }}">
                    <div style="padding: 10px !important;">
                        @includeif('Backend.Forms.fieldsOptions.multiValues')
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
