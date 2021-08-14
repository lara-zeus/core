<?php
$crudFieldsSections = "crudFieldsSections" . $secID;

$formsHelper        = new \App\Classes\Forms\CurrentFields\Helpers();
$LocksPoliciesClass = new \App\Classes\LocksPolicies\LocksPolicies();
$getFields          = $formsHelper->availableFields();
$getFieldsMultiVal  = $getFields->where('isMultiVals', true);
$LocksPolicies      = [];
?>
<div class="sort-item Sec_{{ $secID }}" id="Sec_{{ $secID }}">
    {!! $$crudFieldsSections->get('secId['.$secID.']') !!}
    <div class="callout section-active">
        <div class="row">
            <div class="small-3 columns">
                <span>{{ trans($langPath.'.section') }} # {{ $secID }}</span>
            </div>
            <div class="small-9 columns">
                <div class="button-group">
                    <a onclick="deletSec(this, {{ $secID }}, {{ $id }})" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteSection') }}">
                        <i class="fa fa-lg fa-close"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" class="hide sort-mover float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                        <i class="fa fa-lg fa-fw fa-arrows"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="doExpand(this)" class="expandSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                        <i class="fa fa-lg fa-fw fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="expandSectionContent">

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
                @if($section->fields->isEmpty())
                    <br>
                @else
                    @foreach ($section->fields->where('type','!=','preListSub') as $field)
                        <?php $fieldID = $textID = $newfieldidfuckyouforms[$field->id]; ?>
                        <?php $crudFieldsField = "crudFields_" . $secID . '_' . $fieldID;?>
                        @if($field->type == 'paragraph')
                            @include('Backend.Forms.Edit.Text')
                            <input type="hidden" value="ADD" name="field[fieldAction][{{ $secID }}][{{ $fieldID }}]" id="field[type][{{ $secID }}][{{ $fieldID }}]">
                        @else
                            @include('Backend.Forms.Edit.Field')
                            <input type="hidden" value="ADD" name="field[fieldAction][{{ $secID }}][{{ $fieldID }}]" id="field[type][{{ $secID }}][{{ $fieldID }}]">
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
<script>
    $('.filedType').select2({
        width                  : "100%",
        minimumResultsForSearch: -1,
        templateResult         : formatState
    });
</script>
