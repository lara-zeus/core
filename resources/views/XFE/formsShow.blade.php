<x-zeus::layout>

    @php
        $options = $form->options;
    @endphp

    <form enctype="multipart/form-data" method="POST" action="{{ url("/Forms/save") }}" id="formMaker" name="formMaker" class="validateForm">
        <input type="hidden" name="form_id" value="{{ $form->id }}">
        <input type="hidden" name="formRand" value="{{ rand(1, 9999) }}">
        <input type="hidden" name="onBehalf" value="{{ request('onBehalf') }}">
        <input type="hidden" name="formParams" value="{{ htmlspecialchars(json_encode(request()->all())) }}">
        <input type="hidden" name="edit" value="{{ request('edit',0) }}">
        @csrf

        @include('former::FE/PreShowForm')

        @if($form->sections->count() !== 0)
            @foreach($form->sections as $section)
                <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 mt-6">
                    <span class="@if (isset($sec) && $section->id != $sec) hidden @endif">
                        @if(isset($section->name) && !empty($section->name))
                            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">
                                <i class="fa fa-indent "></i> {!! $section->name !!}
                                @if (isset($options['sectionsToPages']) && $options['sectionsToPages'] == 1)
                                    <span class="float-{{ trans('Common.left') }}">
                                        {{ trans('Frontend/App/Forms.step') }} {{ $secNo }} {{ trans('Frontend/App/Forms.from') }} {{ $form->sections->count() }}
                                    </span>
                                @endif
                            </h2>
                        @endif
                    </span>

                    @foreach($form->fields as $field)
                        @if($section->id === $field->section_id)
                            <div class="bord p-4">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="{{ $field->html_id }}">{{ $field->name }}</label>
                                    @if(isset($field->desc) && !empty($field->desc))
                                        <p>{{ $field->desc }}</p>
                                    @endif

                                    @include('former::fields.'.$field->type)
                                    {{--{!! (new LaraZeus\Core\Classes\Builder)->fieldRender($field,$dataSet,$urlValues) !!}--}}
                                </div>
                            </div>
                        @endif
                    @endforeach
                </section>

            @endforeach
        @endif

        @guest
            Captcha
        @endguest


        <div class="max-w-4xl p-6 mx-auto flex justify-end mt-6">
            @include('former::FE/Buttons')

            <button class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>

        <div id="result"></div>

        @include('former::FE/ShowResult')

    </form>


</x-zeus::layout>
