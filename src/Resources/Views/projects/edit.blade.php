@extends('luba::projects._master')
@section('page.title', __('luba::ui.edit_project'))
@section('page.subtitle', __('luba::ui.edit_project_description'))
@section('detail')
    <luba-breadcrumb
        title="luba::ui.project_edit"
        route="#"/>
    <luba-breadcrumb
        :title="$project->title"
        :route="route('luba::projects.manage', $project->encodedId)"/>

    <div class="row">
        <!-- Form inputs -->
        <div class="col-md-8">
            <form action="{{ route('luba::projects.update', $project->encodedId) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $project->encodedId }}">
                <luba-input-text :value="$project->title" name="title" label="project_title" help="edit"/>
                <luba-input-text :value="$project->description" name="description" label="project_description" help="edit"/>
                <luba-input-text :value="$project->path" name="path" label="project_path" help="edit"/>
                <luba-input-check :checked="$project->public" name="public" label="project_public" help="edit"/>

                <div class="form-group text-right mt-3">
                    <a href="window.history.back()" class="btn btn-default">
                        @lang('luba::forms.go_back')
                    </a>
                    <button type="submit" class="btn btn-primary">
                        @lang('luba::forms.project_update')
                    </button>
                </div>
            </form>
        </div>

        <luba-help-card class="col-md-4" namespace="edit" />
    </div>
@stop
