<div class="NewTextField sort-item_edit" id="textFld_{{ $textID }}" style="padding: 0 50px 0 20px; !important;">
    <input type="hidden" value="EDIT" name="field[fieldAction][{{ $secID }}][{{ $textID }}]" id="field[type][{{ $secID }}][{{ $textID }}]">
    {!! $$crudFieldsField->get('fieldId['.$secID.']['.$textID.']') !!}
    <input type="hidden" value="paragraph" name="field[type][{{ $secID }}][{{ $textID }}]">


    <div class="callout hollow boxShadow">

        <div class="row">
            <div class="large-6 small-12 columns">
                <span>{{ trans($langPath.'.textField') }} # {{ $textID }}</span>
            </div>
            <div class="large-6 small-12 columns">
                <a onclick="deleteField(this,{{ $textID }}, {{ $id }})" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteTextField') }}">
                    <i class="fa fa-close fa-lg"></i>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" class="sort-mover_edit float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveTextField') }}">
                    <i class="fa fa-lg fa-fw fa-arrows"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="small-9 columns">
                {!! $$crudFieldsField->get('field[name]['.$secID.']['.$textID.']') !!}
            </div>
            <div class="small-3 columns fieldPosition hidee">
                <label for="field[position][{{ $secID }}][{{ $textID }}]">{{ trans($langPath.'.position') }}</label>
                {!! $$crudFieldsField->get('field[position]['.$secID.']['.$textID.']') !!}
            </div>
        </div>
    </div>

</div>
