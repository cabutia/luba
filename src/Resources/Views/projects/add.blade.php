@extends('luba::projects._master')
@section('page.title', __('luba::ui.add_project'))
@section('page.subtitle', __('luba::ui.add_project_description'))
@section('detail')
    <div class="row">
        <!-- Form inputs -->
        <div class="col-md-8">
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">@lang('luba::forms.project_title')</label>
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="form-control"
                        placeholder="@lang('luba::forms.project_title_hint')">
                </div>
                <div class="form-group">
                    <label for="description">@lang('luba::forms.project_description')</label>
                    <input
                        type="text"
                        name="description"
                        value="{{ old('description') }}"
                        class="form-control"
                        placeholder="@lang('luba::forms.project_description_hint')">
                </div>
                <div class="form-group">
                    <label for="path">@lang('luba::forms.project_path')</label>
                    <input
                        type="text"
                        name="path"
                        value="{{ old('path') }}"
                        class="form-control"
                        placeholder="@lang('luba::forms.project_path_hint')">
                </div>
                <div class="form-group">
                    <label>@lang('luba::forms.project_image')</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="project_image" name="project_image">
                        <label class="custom-file-label" for="project_image">
                            @lang('luba::forms.choose_file')
                        </label>
                    </div>
                </div>
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
