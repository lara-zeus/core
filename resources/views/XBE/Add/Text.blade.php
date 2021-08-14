<div class="sort-item textFld_{{ $id }}" style="padding: 0 50px 0 20px; !important;" id="textFld_{{ $textID }}">
    {!! $crudFields->get('fieldId['.$id.'][]') !!}
    <input type="hidden" value="paragraph" name="field[type][{{ $id }}][{{ $textID }}]" id="field[type][{{ $id }}][{{ $textID }}]">

    <div class="callout hollow boxShadow">

        <div class="row">
            <div class="large-6 small-12 columns">
                <span>{{ trans($langPath.'.textField') }} # {{ $textID }}</span>
            </div>
            <div class="large-6 small-12 columns">
                <a onclick="deleteField(this)" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteTextField') }}">
                    <span class="fa fa-close fa-lg"></span>
                </a>
                <a style="margin-{{ trans('Common.left') }}: 10px;" class="sort-mover float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                    <i class="fa fa-lg fa-fw fa-arrows"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="small-9 columns">
                {!! $crudFields->get('field[name]['.$id.']['.$textID.']') !!}
            </div>
            <div class="small-3 columns fieldPosition hidee">
                <label for="field[position][{{ $id }}][{{ $textID }}]">{{ trans($langPath.'.position') }}</label>
                {!! $crudFields->get('field[position]['.$id.']['.$textID.']') !!}
            </div>
        </div>
    </div>
</div>
