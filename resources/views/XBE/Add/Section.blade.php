<div class="Sec_{{ $secID }}" id="Sec_{{ $secID }}">
    {!! $crudFields->get('secId[]') !!}
    <div class="sort-item callout section-active">
        <div class="row">
            <div class="small-3 columns">
                <span>{{ trans($langPath.'.section') }} # {{ $secID }}</span>
            </div>
            <div class="small-9 columns">
                <div class="button-group">
                    <a onclick="deletSec(this)" class="float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.deleteSection') }}">
                        <i class="fa fa-lg fa-close"></i>
                    </a>
                    <a style="margin-{{ trans('Common.left') }}: 10px;" class="hide sort-mover float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.moveField') }}">
                        <i class="fa fa-lg fa-fw fa-arrows"></i>
                    </a>

                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="ExpandAllFields(this)" class="expandSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandSection') }}">
                        <i class="fa fa-lg fa-fw fa-angle-double-up"></i>
                    </a>

                    <a style="margin-{{ trans('Common.left') }}: 10px;" onclick="doExpand(this)" class="expandSection float-{{ trans('Common.left') }}" title="{{ trans($langPath.'.expandSection') }}">
                        <i class="fa fa-lg fa-fw fa-chevron-up"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="expandSectionContent">
            <div class="row">
                <div class="column large-9">
                    {!! $crudFields->get('secTitle['.$secID.']') !!}
                </div>
                <div class="column large-3">
                    <label>
                        <i class="fa fa-sort"></i>
                        {{ trans($langPath.'.secOrder') }}
                    </label>
                    {!! $crudFields->get('secOrder['.$secID.']') !!}
                </div>
            </div>
            <hr>

            {{ secBtns($secID,$langPath) }}
            {{-- New Fields --}}
            <div class="row sortable" id="FieldsSection_{{ $secID }}">
                <br>
            </div>
            {{-- New Fields --}}
            {{ secBtns($secID,$langPath) }}
        </div>

    </div>
    <script>
        addField({{ $secID }});
        setLangTabFocus();
        $(".sortable").sortable({
            placeholder: "sortable-placeholder",
            items: '.sort-item',
            handle: ".sort-mover"
        });
    </script>
    <hr>
</div>
<?php
//add Fields and Text Fields to sections
function secBtns($secID, $langPath)
{
    echo '
        <div class="clearfix">
            <a style="margin-'.trans('Common.right').': 5px;" class="button info tiny float-' . trans('Common.left') . '" onclick="addText(' . $secID . ')" title="' . trans($langPath . '.addText') . '">
                <i class="fa fa-lg fa-text-height"></i>
            </a>
            <a class="button info tiny float-' . trans('Common.left') . '" onclick="addField(' . $secID . ')" title="' . trans($langPath . '.addField') . '">
                <i class="fa fa-lg fa-plus-square-o"></i>
            </a>
        </div>
    ';
}
?>
