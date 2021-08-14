@extends('Backend.Layout.MasterLayout')

@section('content')
    <div id="page-content-wrapper" class="build-forms">

        <form method="POST" action="{{ \EvoCore::CPUrl("/Forms/Export") }}" id="formMaker" class="validateForm">
            @csrf

            <input type="hidden" value="{{ $id }}" name="id">
            <div class="row">
                <div class="medium-12 columns">
                    <div class="box-wrapper withShadow">
                        <div class="box-header">
                            <h2>{{ trans($langPath.'.export') }}: {{ $formTitle ?? '' }}</h2>
                            <cite>{{ trans($langPath.'.export_desc') }}</cite>
                        </div>
                        <div class="box-content">
                            <div class="row">
                                <div class="medium-3 columns">
                                    <label for="exportAll">
                                        <i class="fa fa-sign-out"></i> {{ trans($langPath.'.exportAll') }}
                                    </label>
                                    {!! $crudFields->get('exportAll') !!}
                                </div>

                                <div class="medium-3 columns">
                                    <label for="usersOnly">
                                        <i class="fa fa-sign-out"></i> {{ trans($langPath.'.usersOnly') }}
                                    </label>
                                    {!! $crudFields->get('usersOnly') !!}
                                </div>
                                @php
                                    $LocksPoliciesClass = new \App\Classes\LocksPolicies\LocksPolicies();
                                    $isLockedWf     = $LocksPoliciesClass->isAppLocked('WORKFLOW_CONTROL', 'FORMS', $id);
                                    $isLockedTicket = $LocksPoliciesClass->isAppLocked('TICKETS', 'FORMS', $id);
                                @endphp
                                @if($isLockedWf)
                                    <div class="medium-3 columns">
                                        <label for="withWf">
                                            <i class="fa fa-sign-out"></i> {{ trans($langPath.'.withWf') }}
                                        </label>
                                        {!! $crudFields->get('withWf') !!}
                                    </div>
                                @endif

                                @if($isLockedTicket)
                                    <div class="medium-3 columns">
                                        <label for="withTickets">
                                            <i class="fa fa-sign-out"></i> {{ trans($langPath.'.withTickets') }}
                                        </label>
                                        {!! $crudFields->get('withTickets') !!}
                                    </div>
                                @endif

                                <div class="medium-3 columns">
                                    <label for="exportUserType">
                                        <i class="fa fa-language"></i> {{ trans($langPath.'.delimiter') }}
                                    </label>
                                    {!! $crudFields->get('delimiter') !!}
                                </div>
                            </div>

                            <div id="exportOptions" class="hidee">
                                <br>
                                <div class="row">
                                    <div class="medium-4 columns">
                                        <label for="end_date">
                                            <i class="fa fa-archive"></i> {{ trans($langPath.'.incloudArchive') }}
                                        </label>
                                        {!! $crudFields->get('archive') !!}
                                    </div>
                                    <div class="medium-8 columns">
                                        <label for="exportUserType">
                                            <i class="fa fa-users"></i> {{ trans($langPath.'.exportUserType') }}
                                        </label>
                                        {!! $crudFields->get('exportUserType') !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="medium-6 columns">
                                        <label for="start_date">
                                            <i class="fa fa-calendar"></i> {{ trans($langPath.'.start_date') }}
                                        </label>
                                        {!! $crudFields->get('start_date') !!}
                                    </div>
                                    <div class="medium-6 columns">
                                        <label for="end_date">
                                            <i class="fa fa-calendar-o"></i> {{ trans($langPath.'.end_date') }}
                                        </label>
                                        {!! $crudFields->get('end_date') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer" style="padding-top: 15px;">
                            <button class="button info float-center exportBtn" type="submit">
                                <i class="fa fa-table"></i>
                                &nbsp;&nbsp;{{ trans($langPath.'.export') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="result"></div>
@stop

@section('css')
    @if(!empty($crudFields->getCssFiles()))
        {!! $crudFields->getCssFiles() !!}
    @endif
    <style>
        .switch { /* centering the switcher */
            margin-top: 5px !important;
            margin-bottom: -1px !important;
        }

        .highlight .callout { /* when adding items */
            background: #ffc !important;
        }
    </style>
@stop

@section('js')
    @if(!empty($crudFields->getJsFiles()))
        {!! $crudFields->getJsFiles() !!}
    @endif
    @if(!empty($crudFields->getJsCodes()))
        {!! $crudFields->getJsCodes() !!}
    @endif
    <script>
        $('#exportAll').click(function () {

            if ($(this).is(':checked')) {
                $('#exportOptions').fadeOut();
            } else {
                $('#exportOptions').fadeIn();
            }


        });
        $(".exportBtn").click(function () {
            $(this).find(".fa").removeClass('fa-table').addClass('fa-spinner fa-spin');

            $(this).delay(100).queue(function (nxt) {
                $(this).removeClass('info').addClass('success');
                nxt();
            });

            $(this).find(".fa").delay(1000).queue(function (nxt) {
                $(this).removeClass('fa-spinner fa-spin').addClass('fa-check');
                nxt();
            });

            $(this).delay(2000).queue(function (nxt) {
                $(this).find(".fa").removeClass('fa-check').addClass('fa-table');
                $(this).removeClass('success').addClass('info');
                nxt();
            });
        });
    </script>
@stop
