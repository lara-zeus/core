@if (!$fields->isEmpty())
    <?php
    $counter = 1;
    $perRow = 3;
    $total = $fields->count();
    $form  = \App\Models\Forms\Forms::findOrFail($form_id);
    ?>

    @foreach ($fields as $field)
        @if ($counter % $perRow == 1) <div class="row"> @endif
        <?php
        $answer = (new \App\Classes\Forms\CurrentFields\Helpers())
            ->getFieldsResponseModel($form)
            ::where('response_id', $response_id)
            ->where('field_id', $field->id)
            ->get();
        ?>
        @foreach ($answer as $ans)
            @if (!empty($ans->response))
                <?php $grid = ( $fields->count() == 1 || $field->type === 'textarea' || $field->type === 'VCF' ) ? 'large-12' : 'large-6'; ?>
                <div class="columns end {{ $grid }}">
                    <div class='callout boxShadow'>
                        <span class='text-info'>{{ $field->crudPhrase->value ?? '' }}</span><br>
                        <?php
                        $renderClass = 'App\\Classes\\Forms\\Fields\\Classes\\' . ucfirst($field->type);
                        if (class_exists($renderClass)) {
                            echo (new $renderClass())->showResponse($field, $ans);
                        }
                        ?>
                    </div>
                </div>
            @endif
        @endforeach

        @if ($counter % $perRow == 0 || $counter >= $total) </div> @endif
        <?php $counter++; ?>
    @endforeach
@endif
