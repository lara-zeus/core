<div class="mainMultiRows_vals small-6 columns hide">
    <div class="input-group boxShadow">
        <div style="padding: 15px;">
            {{ trans('Frontend/App/Forms.listVal') }}
            <input class="input-group-field valField" name="vals[val][]" type="text">
            <span class="text-small">{{ trans('Frontend/App/Forms.listKey') }}&nbsp;({{ trans('Frontend/App/Forms.optional') }})</span>
            <input class="input-group-field keyField" name="vals[key][]" type="text">
        </div>

        <label class="input-group-label" style="border: unset">
            <a title="delete" class="deleteRow button tiny warning">
                <i class="fa fa-minus"></i>
            </a>
        </label>
    </div>
</div>

<div class="clearfix">
    <div class="float-{{ trans('Common.left') }}">
        <a class="addNewRow_vals button tiny info">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>
<div class="multiRowsContainer_vals" row>
    @if(isset($row) && !empty($row))
        @if(isset($row->list_values) && \EvoTools::isJson($row->list_values))
            <?php $vals = json_decode($row->list_values) ?>
            @foreach($vals as $key => $val)
                <div class="small-6 columns">
                    <div class="input-group boxShadow">
                        <div style="padding: 15px;">
                            {{ trans('Frontend/App/Forms.listVal') }}
                            <input class="input-group-field valField" name="vals[val][]" type="text" value="{{ $val }}">
                            {{ trans('Frontend/App/Forms.listKey') }}
                            <input class="input-group-field keyField" name="vals[key][]" type="text" value="{{ $key }}">
                        </div>
                        <label class="input-group-label" style="border: unset">
                            <a title="delete" class="deleteRow button tiny warning">
                                <i class="fa fa-minus"></i>
                            </a>
                        </label>
                    </div>
                </div>
            @endforeach
        @endif
    @endif
</div>
@push('scripts')
    <script>
        $('.selectSearch').select2();
        $('.addNewRow_vals').on('click', function () {
            doClone('vals');
        });

        function doClone(fieldName) {
            $('.mainMultiRows_' + fieldName)
                .clone()
                .removeClass('mainMultiRows_' + fieldName + ' hide')
                .appendTo('.multiRowsContainer_' + fieldName + '')
            ;

            return false;
        }
        $(document).on('click', '.deleteRow', function () {
            $(this).parent().parent().remove();
        });

        $(document).on('keyup', '.valField', function () {
            $(this).parent().find('.keyField').val($(this).val());
        });

    </script>
@endpush
