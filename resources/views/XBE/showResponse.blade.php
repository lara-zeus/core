@extends('Backend.Layout.MasterLayout')

@section('css')
    <style>
        @media print {
            table {
                page-break-inside: auto;
            }
            tr {
                page-break-inside: auto;
            }
            div.row > div {
                border: solid 1px #ccc;
            }

            .box-content {
                border: none !important;
            }

            .box-wrapper > .box-content::before {
                border-bottom: none !important;
            }
        }
    </style>
@stop

@section('js')
    <script>
        window.print();
    </script>
@stop

@section('content')
    <div id="page-content-wrapper" class="build-forms">
        <div class="row">
            <div class="medium-12 columns">
                <div class="box-wrapper">
                    <div class="box-header clearfix hide-for-print">
                        {{ $_['title'] }}
                    </div>
                    <div class="box-content">
                        <table class="full-width">
                            <tbody>
                            @foreach ($_['preparedFields'] as $field)
                                <tr class="active">
                                    <th>{{$field->label}}</th>
                                    <td class="text-center">@include('Backend.Crud.ShowFields')</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer text-{{ trans('Common.left') }} clearfix hide-for-print">
                        <br>
                        <a class="button info small" onclick="window.print();">{{ trans('Crud.print') }}</a>
                        <a class="button info small" onclick="window.history.back();">{{ trans('Crud.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
