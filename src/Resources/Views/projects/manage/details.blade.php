@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_details"
        :route="route('luba::projects.manage.details', $project->encodedId)"/>
    <div class="card">
        <div class="card-header">
            @lang('luba::ui.project_details')
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <th>@lang('luba::forms.project_title')</th>
                    <td>{{ $project->title }}</td>
                </tr>
                <tr>
                    <th>@lang('luba::forms.project_description')</th>
                    <td>{{ $project->description }}</td>
                </tr>
                <tr>
                    <th>@lang('luba::forms.project_path')</th>
                    <td>{{ $project->path }}</td>
                </tr>
                <tr>
                    <th>@lang('luba::ui.project_visibility')</th>
                    <td>@lang('luba::ui.project_visibility_' . ($project->public ? 'true' : 'false'))</td>
                </tr>
            </table>
        </div>
    </div>
@stop
