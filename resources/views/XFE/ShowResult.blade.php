<div id="formresult" class="hidee">
    <div class="row">
        <div class="large-12 small-12 column text-center">
            <div class="callout secondary text-{{ trans('Common.right') }}">
                <div id="callBackResult">
                    <i class="fa fa-check"></i>&nbsp;
                </div>
            </div>

            @php
                $params = request()->all();
                if (isset($options->sectionsToPages) && $options->sectionsToPages == 1) {
                    unset($params['sec']);
                }
                $url = url("/App/Forms/Show/".$form->id) . (!empty($params) ? '?' . http_build_query($params) : '')
            @endphp

            <a class="button info" href="{{ $url }}">
                <i class="fa fa-lg fa-repeat"></i>
                {{ trans('Frontend/App/Forms.backToForm') }}
            </a>
            <br>
            <br>
        </div>
    </div>
</div>
