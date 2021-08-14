@if (isset($options->sectionsToPages) && $options->sectionsToPages == 1)
    @php
        $prevSecUrl = $prevSec !== null ? request()->fullUrlWithQuery(['sec' => $prevSec]) : null;
        $nextSecUrl = $nextSec !== null ? request()->fullUrlWithQuery(['sec' => $nextSec]) : null;
    @endphp
    <a id="back" type="submit" class="button info float-{{ trans('Common.right') }} @if($prevSec === null) disabled @endif" href="{{ $prevSecUrl }}">
        <i class="fa fa-lg fa-chevron-right"></i>
        &nbsp;&nbsp;{{ trans('Frontend/App/Forms.backToPrevPage') }}
    </a>
    @if (!request()->has('preview'))
        <button id="saveAndNextBtn" data-next="{{ $nextSecUrl }}" type="submit" class="button success float-{{ trans('Common.left') }} @if($nextSec === null) disabled @endif" name="SAVE_AND_NEXT">
            {{ trans('Common.next') }}&nbsp;&nbsp;
            <i class="fa fa-lg fa-chevron-left"></i>
        </button>
    @else
        <a href="{{ $nextSecUrl }}" class="button success float-{{ trans('Common.left') }} @if($nextSec === null) disabled @endif" title="{{ trans('Common.next') }}">
            {{ trans('Common.next') }}&nbsp;&nbsp;
            <i class="fa fa-lg fa-chevron-left"></i>
        </a>
    @endif

    @if($nextSec === null && !request()->has('preview'))
        <button id="saveBtn" type="submit" class="button success" name="SAVE">
            <i class="fa fa-lg fa-save"></i>
            &nbsp;&nbsp;{{ trans('Common.submitBtn') }}
        </button>
    @endif
@endif

@if(!request()->has('preview'))
    @if (!isset($options->sectionsToPages) || $options->sectionsToPages != 1)
        <button id="saveDraftBtn" type="button" class="button info" name="draft">
            <i class="fa fa-lg fa-save"></i>
            &nbsp;&nbsp;{{ trans('Frontend/App/Forms.saveDraft') }}
        </button>
    @endif

    @if (!isset($options->sectionsToPages) || $options->sectionsToPages != 1)
        <button id="saveBtn" type="submit" class="button success" name="SAVE">
            <i class="fa fa-lg fa-save"></i>
            &nbsp;&nbsp;{{ trans('Common.submitBtn') }}
        </button>
    @endif
@endif
