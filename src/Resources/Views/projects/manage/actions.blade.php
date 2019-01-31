@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_actions"
        :route="route('luba::projects.manage.actions', $project->encodedId)"/>
    <div class="card">
        <div class="card-header">
            @lang('luba::ui.project_sync')
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @lang('luba::ui.project_sync_description')
                </div>
                <form class="col-auto" method="POST" action="{{ route('luba::projects.manage.actions.sync', $project->encodedId) }}">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->encodedId }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-sync"></i>
                        @lang('luba::ui.project_sync_now')
                    </button>
                </form>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-sm-6 col-md-3 text-center">
                    <small>@lang('luba::ui.project_total_commits')</small>
                    <p>{{ $project->commits->count() }}</p>
                </div>
                <div class="col-sm-6 col-md-3 text-center">
                    <small>@lang('luba::ui.project_last_update')</small>
                    <p>{{ $project->hasCommits ? $project->lastCommit->date : __('luba::ui.no_data') }}</p>
                </div>
                <div class="col-sm-6 col-md-3 text-center">
                    <small>@lang('luba::ui.project_created_at')</small>
                    <p>{{ $project->hasCommits ? $project->firstCommit->date : __('luba::ui.no_data') }}</p>
                </div>
                <div class="col-sm-6 col-md-3 text-center">
                    <small>@lang('luba::ui.project_visibility')</small>
                    <p>@lang('luba::ui.project_visibility_' . ($project->public ? 'true' : 'false'))</p>
                </div>
            </div>
        </div>
    </div>
@stop
