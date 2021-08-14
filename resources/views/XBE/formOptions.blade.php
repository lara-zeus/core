<?php
$notForPoll = (isset($id) && $form->type == 'poll') ? ' hidee' : '';
?>
<ul class="accordion boxShadow" data-multi-expand="true" data-accordion data-allow-all-closed="true">
    {{-- Titel and Desc --}}
    <li class="accordion-item is-active" data-accordion-item>
        <a class="accordion-title">
            <h3><i class="fa fa-font"></i> {{ trans($langPath.'.namingOpt') }}</h3>
        </a>
        <div class="accordion-content" data-tab-content>
            {!! $crudFields->get('title') !!}
            <br>
            {!! $crudFields->get('desc') !!}
            <br>
            {!! $crudFields->get('detailDesc') !!}
        </div>
    </li>
    {{-- Titel and Desc --}}

    {{--View Options--}}
    <li class="accordion-item is-active" data-accordion-item>
        <a class="accordion-title">
            <h3><i class="fa fa-eye"></i> {{ trans($langPath.'.viewOpt') }}</h3>
        </a>
        <div class="accordion-content" data-tab-content>
            <label data-uqu-required>
                <i class="fa fa-bars"></i> {{ trans($langPath.'.cat_id') }}
                <a target="_blank" href="{{ \EvoCore::CPUrl('/Categories/create') }}">{{ trans('Crud.add') }}</a>
            </label>
            {!! $crudFields->get('cat_id') !!}
            <br>

            <div class="@if(isset($LocksPoliciesClass) && $LocksPoliciesClass->isLocked($LocksPolicies,'FORMS',$id,'formType')) locked_item @endif">
                <label for="type" data-uqu-required>
                    <i class="fa fa-comment"></i> {{ trans($langPath.'.type') }}
                </label>
                {!! $crudFields->get('type') !!}
                {{-- to Send type when edit --}}
                @if (isset($id))
                    <input type="hidden" name="type" value="{{ $form->type }}">
                @endif
                <br>
            </div>

            <div class="@if(isset($LocksPoliciesClass) && $LocksPoliciesClass->isLocked($LocksPolicies,'FORMS',$id,'acl')) locked_item @endif">
                <label for="acl_id" data-uqu-required>
                    <i class="fa fa-eye-slash"></i> {{ trans($langPath.'.acl_id') }}
                </label>
                {!! $crudFields->get('acl_id') !!}
                <br>
            </div>

            <label for="ordering" data-uqu-required>
                <i class="fa fa-eye-slash"></i> {{ trans($langPath.'.ordering') }}
            </label>
            {!! $crudFields->get('ordering') !!}

            <div class="systemOptions">
                <label for="option[slug]">
                    <i class="fa fa-bar-chart"></i>
                    {{ trans($langPath.'.slug') }}
                </label>
                {!! $crudFields->get('option[slug]') !!}
            </div>

            <div>
                <div class="notForPoll notForEval {{ $notForPoll }}">
                    <label for="layout" data-uqu-required>
                        <i class="fa fa-columns"></i> {{ trans($langPath.'.layout') }}
                    </label>
                    {!! $crudFields->get('layout') !!}
                    <br><br>
                </div>

                <div class="notForPoll {{ $notForPoll }}">
                    <label for="option[requestTitle]">
                        <i class="fa fa-sign-in"></i> {{ trans($langPath.'.requestTitle') }}
                        <span class="has-tip custom-tip help-popover">
                            <i class="fa fa-lg fa-question-circle"></i>
                        </span>
                        <div class="webui-popover-content text-small text-right">
                            {{ trans($langPath.'.requestTitle_desc') }}
                        </div>
                    </label>
                    {!! $crudFields->get('option[requestTitle]') !!}
                    <br>
                </div>

                <div class="notForPoll {{ $notForPoll }}">
                    <label for="option[requireLogin]">
                        <i class="fa fa-sign-in"></i> {{ trans($langPath.'.requireLogin') }}
                        <span class="has-tip custom-tip help-popover">
                            <i class="fa fa-lg fa-question-circle"></i>
                        </span>
                        <div class="webui-popover-content text-small text-right">
                            {{ trans($langPath.'.requireLogin_desc') }}
                        </div>
                    </label>
                    {!! $crudFields->get('option[requireLogin]') !!}
                    <br>
                </div>

                <div class="@if(isset($LocksPoliciesClass) && $LocksPoliciesClass->isLocked($LocksPolicies,'FORMS',$id,'requestUserDetails')) locked_item @endif notForPoll {{ $notForPoll }}">
                    <div style="padding: 7px;">
                        <label for="option[requestUserDetails]">
                            <i class="fa fa-user-secret"></i> {{ trans($langPath.'.requestUserDetails') }}
                            <span class="has-tip custom-tip help-popover">
                                <i class="fa fa-lg fa-question-circle"></i>
                            </span>
                            <div class="webui-popover-content text-small text-right">
                                {{ trans($langPath.'.requestUserDetails_desc') }}
                            </div>
                        </label>
                        {!! $crudFields->get('option[requestUserDetails]') !!}
                    </div>
                </div>
            </div>

            <div class="hidee oneEntryPerUser">
                <label for="option[oneEntryPerUser]">
                    <i class="fa fa-user-secret"></i> {{ trans($langPath.'.oneEntryPerUser') }}
                    <span class="has-tip custom-tip help-popover">
                        <i class="fa fa-lg fa-question-circle"></i>
                    </span>
                    <div class="webui-popover-content text-small text-right">
                        {{ trans($langPath.'.oneEntryPerUser_desc') }}
                    </div>
                </label>
                {!! $crudFields->get('option[oneEntryPerUser]') !!}
                <br>
            </div>

            <div class="notForPoll">
                <label for="option[sectionsToPages]">
                    <i class="fa fa-list-alt"></i> {{ trans($langPath.'.sectionsToPages') }}
                    <span class="has-tip custom-tip help-popover">
                        <i class="fa fa-lg fa-question-circle"></i>
                    </span>
                    <div class="webui-popover-content text-small text-right">
                        {{ trans($langPath.'.sectionsToPages_desc') }}
                    </div>
                </label>
                {!! $crudFields->get('option[sectionsToPages]') !!}
                <br>
            </div>

            <div class="userDetailsDiv hidee">
                <label for="option[userDetails]">
                    <i class="fa fa-user-plus"></i> {{ trans($langPath.'.userDetails') }}
                    <span class="has-tip custom-tip" title="{{ trans($langPath.'.userDetails_desc') }}" data-tooltip>
                        <i class="fa fa-lg fa-question-circle"></i>
                    </span>
                </label>
                {!! $crudFields->get('option[userDetails]') !!}
            </div>
        </div>
    </li>
    {{--View Options--}}

    {{--After Options--}}
    <li class="accordion-item is-active" data-accordion-item>
        <a class="accordion-title">
            <h3>
                <i class="fa fa-check-square-o"></i> {{ trans($langPath.'.afterOpt') }}</h3>
        </a>
        <div class="accordion-content" data-tab-content>
            <label for="option[confirmationMessage]">
                <i class="fa fa-commenting"></i>
                {{ trans($langPath.'.confirmationMessage') }}
            </label>
            {!! $crudFields->get('option[confirmationMessage]') !!}
            <br>

            <label for="option[emailsNotification]">
                <i class="fa fa-bell"></i>
                {{ trans($langPath.'.emailsNotification') }}
                <cite>{{ trans($langPath.'.emailsNotification_desc') }}</cite>
            </label>
            {!! $crudFields->get('option[emailsNotification]') !!}

            <div class="OnlyForPoll">
                <label for="option[showResult]">
                    <i class="fa fa-bar-chart"></i>
                    {{ trans($langPath.'.showResult') }}
                </label>
                {!! $crudFields->get('option[showResult]') !!}
            </div>

            <label for="option[webService]">
                <i class="fa fa-cloud"></i>
                {{ trans($langPath.'.webService') }}
            </label>
            {!! $crudFields->get('option[webService]') !!}
        </div>
    </li>
    {{--Before Options--}}

    {{--Publish Options--}}
    <li class="accordion-item is-active" data-accordion-item>
        <a class="accordion-title">
            <h3>
                <i class="fa fa-upload"></i> {{ trans($langPath.'.PublishOptions') }}</h3>
        </a>
        <div class="accordion-content" data-tab-content>
            <label for="is_active">
                <i class="fa fa-check"></i> {{ trans($langPath.'.is_active') }}
            </label>
            <div class="clearfix">
                {!! $crudFields->get('is_active') !!}
                <a title="{{ trans('Crud.back') }}" class="button info float-{{ trans('Common.left') }}" href="{{ \EvoCore::CPUrl("/Forms") }}">
                    <i class="fa fa-lg fa-chevron-{{ trans('Common.right') }}"></i>
                </a>
                <button title="{{ trans('Crud.reset') }}" type="reset" class="button warning float-{{ trans('Common.left') }}" style="margin-{{ trans('Common.left') }}: 5px;">
                    <i class="fa fa-lg fa-eraser"></i>
                </button>
                <button id="saveBtn" title="{{ trans('Common.saveBtn') }}" type="submit" class="button success float-{{ trans('Common.left') }}" name="SAVE" style="margin-{{ trans('Common.left') }}: 5px;">
                    <i class="fa fa-lg fa-save"></i>
                </button>
            </div>
            <br><br>
            <label for="start_date" data-uqu-required>
                <i class="fa fa-calendar"></i> {{ trans($langPath.'.start_date') }}
            </label>
            {!! $crudFields->get('start_date') !!}
            <label for="end_date" data-uqu-required>
                <i class="fa fa-calendar-o"></i> {{ trans($langPath.'.end_date') }}
            </label>
            {!! $crudFields->get('end_date') !!}

            @if(isset($id) && !empty($id))
                <br>
                @if(isset($form->created_by) && !empty($form->created_by) )
                    <label>
                        <i class="fa fa-pencil"></i>
                        &nbsp;&nbsp;
                        {{ trans('Backend/App/Events.created_by') }} : {!! \EvoUsers::userCard($form->created_by) !!}
                    </label>
                @endif

                @if(isset($form->created_by) && !empty($form->created_at) && \EvoTools::is_date($form->created_at))
                    <label>
                        <i class="fa fa-calendar"></i>
                        &nbsp;&nbsp;{{ trans('Backend/App/Events.created_at') }} :
                        {{ $form->created_at->format('d/m/Y') }}
                        | {{ trans('Common.at') }}
                        {{ $form->created_at->format('g:ha') }}
                    </label>
                @endif

                @if(isset($form->created_by) && !empty($form->updated_by) )
                    <label>
                        <i class="fa fa-pencil-square-o"></i>
                        &nbsp;&nbsp;
                        {{ trans('Backend/App/Events.updated_by') }} : {!! \EvoUsers::userCard($form->updated_by) !!}
                    </label>
                @endif
                @if(isset($form->created_by) && !empty($form->updated_at) && \EvoTools::is_date($form->updated_at) )
                    <label>
                        <i class="fa fa-calendar"></i>
                        &nbsp;&nbsp;{{ trans('Backend/App/Events.updated_at') }} :
                        {{ $form->updated_at->format('d/m/Y') }}
                        | {{ trans('Common.at') }}
                        {{ $form->updated_at->format('g:ha') }}
                    </label>
                @endif
                <br>
            @endif

        </div>
    </li>
    {{--Publish Options--}}
</ul>
