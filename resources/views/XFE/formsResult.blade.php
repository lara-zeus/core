@extends("Frontend.Layout.MasterLayout")

@section("page-content")
    <div id="page-content-wrapper" class="build-forms">
        <div class="small-12 columns">
            <h1 id="page-title">{{ $form->name ?? '' }}</h1>
            <h3>{{ $form->desc ?? '' }}</h3>

            <div class="time text-small text-darkgrey">
                <a>
                    <i class="fa fa-tag"></i>
                    &nbsp;{{ $form->cat->crudPhrase->value ?? '' }}
                </a>
                &nbsp;&nbsp;
                <i class="fa fa-calendar"></i>
                &nbsp;{{ trans('Frontend/App/Forms.from') }} :
                <time data-lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-uqu-hijri data-date="{{ $form->start_date->format('Y/m/d') }}" data-date-format="yyyy/mm/dd هـ"></time>
                -
                <span>{{ $form->start_date->format('Y/m/d') }} م</span>
                &nbsp;,&nbsp; {{ trans('Frontend/App/Forms.to') }} :
                <time data-lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-uqu-hijri data-date="{{ $form->end_date->format('Y/m/d') }}" data-date-format="yyyy/mm/dd هـ"></time>
                -
                <span>{{ $form->end_date->format('Y/m/d') }} م</span>
            </div>
            <hr>
            <div id="formBody">
                @if(isset($charts['textFields']) && !empty($charts['textFields']))
                    <div class="box-wrapper withShadow">
                        <div class="box-header clearfix">
                            <h2>{{ $charts['textFields']['options']['title']['text'] ?? '' }}</h2>
                        </div>
                        <div class="box-content">
                            <canvas width="700" height="200" id="textFields"></canvas>
                        </div>
                    </div>
                    <br><br>
                @endif

                @if($form->fields->where('type','!=','paragraph')->count() != 0)
                    <?php
                    $perRow  = 3;
                    $counter = 0;
                    $total   = $form->fields->where('type','!=','paragraph')->count();
                    ?>
                    @foreach($form->fields->where('type','!=','paragraph') as $field)
                        <?php
                        $fieldOptions = json_decode($field->options);
                        $totalResponses = (new \App\Classes\Forms\CurrentFields\Helpers())
                            ->getFieldsResponseModel($form)
                            ::where('form_id', $form->id)
                            ->where('field_id', $field->id)
                            ->count();
                        ?>
                            @if($counter % $perRow == 1) <div class="row"> @endif
                                <?php
                                $fieldPhr  = App\Models\Forms\Fields::phrasesObject($field->id, \App\Models\Phr\AppForms::class);
                                ?>
                                <div class="large-4 medium-6 small-12 column @if($counter == $total) end @endif">
                                    <div class="box-wrapper withShadow">
                                        <div class="box-header clearfix">
                                            <h2 class="float-{{ trans('Common.right') }}">

                                                {{ $fieldPhr->fieldTitle ?? '' }}
                                                <br>
                                                <span class="text-info text-small">{{ $fieldPhr->fieldDesc ?? '' }}</span>
                                            </h2>
                                            <span class="text-darkgrey has-tip custom-tip float-{{ trans('Common.left') }}" title="{{ trans('Frontend/App/Forms.totalVotes') }}" data-tooltip aria-haspopup="true">
                                            <i class="fa fa-hashtag"></i>&nbsp;{{ $totalResponses }}
                                        </span>
                                        </div>
                                        <div class="box-content">
                                            <canvas width="300" height="200" id="fields_{{ $field->id }}"></canvas>
                                        </div>
                                    </div>
                                </div>
                                @if($counter % $perRow == 0 || $counter >= $total) </div> @endif
                            <?php $counter++; ?>
                    @endforeach
                @endif
            </div>

            <div class="text-center">
                <a class="button info" href="{{ \EvoCore::Url("/".$siteEmail."/App/Forms/Show/".$form->id) }}">
                    <i class="fa fa-lg fa-repeat"></i>
                    {{ trans('Frontend/App/Forms.backToForm') }}
                </a>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ config('app.static') }}/vendors/evo-team/common/chartJs/Chart.js?v={{ config('app.version') }}"></script>
    <script src="{{ config('app.static') }}/vendors/evo-team/common/chartJs/Chart.config.js?v={{ config('app.version') }}"></script>
    <?php $chartHandler = new \App\Classes\Common(); ?>
    <script>
        {!! $chartHandler->setChartJS($charts) !!}
    </script>
@stop
