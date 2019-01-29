@extends('luba::projects._master')
@section('page.title', __('luba::ui.add_project'))
@section('page.subtitle', __('luba::ui.add_project_description'))
@section('detail')
    <div class="row">
        <!-- Form inputs -->
        <div class="col-md-8">
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <luba-input-text name="title" label="project_title" required/>
                <luba-input-text name="description" label="project_description" />
                <luba-input-text name="path" label="project_path" />
                <luba-input-file name="image" label="project_image" />

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
        <div class="col-md-4">
            <div class="card bg-light px-2 py-2">
                <div class="row">
                    <div class="col-12">
                        <h4>@lang('luba::forms.help_card_hint')</h4>
                    </div>
                    <div class="col-12">
                        <h5>@lang('luba::forms.project_title')</h5>
                        <p>@lang('luba::forms.help.project_title')</p>
                    </div>
                    <div class="col-12">
                        <h5>@lang('luba::forms.project_description')</h5>
                        <p>@lang('luba::forms.help.project_description')</p>
                    </div>
                    <div class="col-12">
                        <h5>@lang('luba::forms.project_path')</h5>
                        <p>@lang('luba::forms.help.project_path')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
