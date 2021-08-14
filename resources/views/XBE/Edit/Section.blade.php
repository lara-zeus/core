@php
    $secID = $section->id;
    $crudFieldsSections = "crudFieldsSections" . $secID;
@endphp
<div class="sort-item Sec_{{ $secID }}" id="Sec_{{ $secID }}">
    <input type="hidden" value="EDIT" name="secAction[{{ $secID }}]" id="secAction[{{ $secID }}]">
    {!! $$crudFieldsSections->get('secId['.$secID.']') !!}
    <div class="callout section-active">
        <div class="row">
            <div class="small-3 columns">
                <span>{{ trans($langPath.'.section') }} # {{ $secID }}</span>
            </div>
            <div class="small-9 columns">
                <div class="" style="margin: 0;">
                    <a onclick="deletSec(this, {{ $secID }}, {{ $id }})" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteSection') }}">
                        <i class="fa fa-lg fa-close"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" class="hide sort-mover float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                        <i class="fa fa-lg fa-fw fa-arrows"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="doExpand(this)" class="expandSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandSection') }}">
                        <i class="fa fa-lg fa-fw fa-chevron-up"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="ExpandAllFields(this,{{ $secID }})" class="expandSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandAllSectionFields') }}">
                        <i class="fa fa-lg fa-fw fa-angle-double-up"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="duplicateSection(this, {{ $secID }}, {{ $id }})" class="duplicateSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.duplicateSection') }}">
                        <i class="fa fa-lg fa-fw fa-files-o"></i>
                    </a>
                </div>
            </div>
        </div>
        <h4 class="text-small text-info">
            {{ trans($langPath.'.secTitle') }} :
            {{ $section->crudPhrase->value ?? '' }}
        </h4>
        <div class="expandSectionContent sec_{{ $secID }}">
            <hr>
            <div class="row">
                <div class="column large-9">
                    {!! $$crudFieldsSections->get('secTitle['.$secID.']') !!}
                </div>
                <div class="column large-3">
                    <label>
                        <i class="fa fa-sort"></i>
                        {{ trans($langPath.'.secOrder') }}
                    </label>
                    {!! $$crudFieldsSections->get('secOrder['.$secID.']') !!}
                </div>
            </div>

            <hr>
            {{-- New Fields --}}
            <div class="button-group clearfix">
                <a class="button info tiny float-{{ trans('Common.left') }}" onclick="addText({{ $secID }})" title="{{ trans($langPath.'.addText') }}">
                    <i class="fa fa-text-height"></i>
                </a>
                <a class="button info tiny float-{{ trans('Common.left') }}" onclick="addField({{ $secID }})" title="{{ trans($langPath.'.addField') }}">
                    <i class="fa fa-plus-square-o"></i>
                </a>
            </div>

            <div class="row" id="FieldsSection_{{ $secID }}">
                @if($form->fields->isEmpty())
                    <br>
                @else
                    @foreach ($form->fields->where('type','!=','preListSub')->where('section_id',$section->id) as $field)
                        @php
                            $fieldID = $textID = $field->id;
                            $allFieldOptions = json_decode($field->options);
                            $crudFieldsField = "crudFields_" . $secID . '_' . $fieldID;
                        @endphp
                        @if($field->type === 'paragraph')
                            @include('Backend.Forms.Edit.Text')
                        @else
                            @include('Backend.Forms.Edit.Field')
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="clearfix button-group">
                <a class="button info tiny float-{{ trans('Common.left') }}" onclick="addText({{ $secID }})" title="{{ trans($langPath.'.addText') }}">
                    <i class="fa fa-text-height"></i>
                </a>
                <a class="button info tiny float-{{ trans('Common.left') }}" onclick="addField({{ $secID }})" title="{{ trans($langPath.'.addField') }}">
                    <i class="fa fa-plus-square-o"></i>
                </a>
            </div>
            {{-- New Fields --}}
        </div>
    </div>
</div>
<hr>
