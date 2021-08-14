@extends('Backend.Layout.MasterLayout')

@section('content')
    <div id="page-content-wrapper" class="build-forms">
        <div class="row full-width-grid">
            <div class="small-12 columns">
                <h1 id="page-title">{{ trans('Backend/App/Forms.showStatsFor') }}&nbsp;{{ $formPhr->formTitle ?? '' }}</h1>
                <p>{{ $formPhr->formDesc ?? '' }}</p>
                <hr>

                @if(isset($charts['isArchive']) || isset($charts['userTyps']) || isset($charts['userGenders']) || isset($charts['userIsUQU']) || isset($charts['userMainDept']) || isset($charts['userSupDept']))
                    <h1 class="text-secondary">{{ trans('Backend/App/Forms.usersInfo') }}</h1>
                    <div class="row">
                        <div class="small-12 large-6 columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.isArchive') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="400" height="250" id="isArchive"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 large-6 columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.userIsUQU') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="400" height="250" id="userIsUQU"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="small-12 large-6 columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.userGenders') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="400" height="250" id="userGenders"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 large-6 columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.userTyps') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="400" height="250" id="userTyps"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="small-12 @if (count($usersDeptsKeys) < 40) large-12 @else large-6 @endif columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.userMainDept') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="500" height="@if (count($usersDeptsKeys) < 40) 200 @else 400 @endif" id="userMainDept"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 @if (count($usersSupDeptsKeys) < 40) large-12 @else large-6 @endif columns">
                            <div class="box-wrapper withShadow">
                                <div class="box-header clearfix">
                                    <h2>{{ trans('Backend/App/Forms.userSupDept') }}</h2>
                                </div>
                                <div class="box-content">
                                    <canvas width="500" height="@if (count($usersSupDeptsKeys) < 40) 200 @else 400 @endif" id="userSupDept"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="callout hollow warning">
                        <i class="fa fa-exclamation-triangle fa-lg"></i>&nbsp;&nbsp;
                        {{ trans('Backend/App/Forms.noUserDetailsFound') }}
                    </div>
                @endif

                @if(isset($charts['textFields']) && !empty($charts['textFields']))
                    <br>
                    <div class="box-wrapper withShadow">
                        <div class="box-header full-width">
                            <h1>{{ trans('Backend/App/Forms.textFields') }}</h1>
                        </div>
                        <div class="box-content">
                            <canvas width="700" height="200" id="textFields"></canvas>
                        </div>
                    </div>
                    <br>
                @endif

                @if($form->fields->count() != 0)
                    <?php
                    $fields = $form->fields->whereIn('type', ['paragraph', 'radio', 'checkbox', 'select', 'customList', 'preList', 'range']);
                    $perRow = 3;
                    $counter = 1;
                    $total = $fields->count();
                    ?>
                    <h1 class="text-secondary">{{ trans('Backend/App/Forms.showNonTextFields') }}</h1>

                    @foreach($fields as $field)
                        <?php
                            $fieldOptions = json_decode($field->options);
                            $totalResponses = (new \App\Classes\Forms\CurrentFields\Helpers())
                                ->getFieldsResponseModel($form)
                                ::where('form_id', $form->id)
                                ->where('field_id', $field->id)
                                ->count();
                            $fieldPhr = App\Models\Forms\Forms::phrasesObject($field->id, \App\Models\Phr\AppForms::class);
                        ?>
                        @if($counter % $perRow == 1) <div class="row"> @endif

                        @if($field->type === 'paragraph')
                            <div class="large-12 small-12 column">
                                <br>
                                <hr>
                                <br>
                                <div class="callout hollow warning" style="font-size: larger">
                                    {{ $fieldPhr->fieldTitle ?? '' }}
                                </div>
                            </div>
                        @else
                            <div class="large-6 small-12 column">
                                <div class="box-wrapper withShadow">
                                    <div class="box-header clearfix">
                                        <h2 class="float-{{ trans('Common.right') }}">
                                            {{ $fieldPhr->fieldTitle ?? '' }}
                                            <br>
                                            <small>{{ $fieldPhr->fieldDesc ?? '' }}</small>
                                        </h2>
                                        <span style="color: darkgrey; border-bottom: none; cursor: pointer;" class="has-tip custom-tip float-{{ trans('Common.left') }}" title="{{ trans('Backend/App/Forms.totalEntries') }}" data-tooltip aria-haspopup="true">
                                            <i class="fa fa-hashtag"></i>&nbsp;{{ $totalResponses }}
                                        </span>
                                    </div>
                                    <div class="box-content">
                                        <canvas width="300" height="200" id="fields_{{ $field->id }}"></canvas>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($counter % $perRow == 0 || $counter >= $total) </div> @endif
                        <?php $counter++; ?>
                    @endforeach
                @endif
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

