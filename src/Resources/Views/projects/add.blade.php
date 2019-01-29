@extends('luba::projects._master')
@section('page.title', __('luba::ui.add_project'))
@section('page.subtitle', __('luba::ui.add_project_description'))
@section('detail')
    <div class="row">
        <!-- Form inputs -->
        <div class="col-md-8">
            <form action="{{ route('luba::projects.store') }}" method="post">
                @csrf
                <luba-input-text name="title" label="project_title" help="projects" required/>
                <luba-input-text name="description" label="project_description" help="projects"/>
                <luba-input-text name="path" label="project_path" help="projects"/>
                <luba-input-file name="image" label="project_image" help="projects"/>

                <!-- Buttons -->
                <div class="form-group text-right mt-3">
                    <a href="window.history.back()" class="btn btn-default">
                        @lang('luba::forms.go_back')
                    </a>
                    <button type="submit" class="btn btn-primary">
                        @lang('luba::forms.project_submit')
                    </button>
                </div>
            </form>
        </div>

        <!-- Helper card -->
        <luba-help-card
            class="col-md-4"
            namespace="projects">
        </luba-help-card>
    </div>
@stop
