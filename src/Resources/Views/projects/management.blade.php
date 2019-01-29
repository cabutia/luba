@extends('luba::projects._master')
@section('page.title', __('luba::titles.project_management'))
@section('page.subtitle', __('luba::titles.project_management_description'))
@section('detail')
    <div class="row">
        <div class="col-md-8">
            @foreach ($projects as $project)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="col-12 text-light px-0">
                                <img src="https://dummyimage.com/1200x200/ddd/444&text=%26nbsp%3B" class="img-fluid">
                            </div>
                            <div class="col-12 text-center" style="margin-top: -40px">
                                <img src="https://dummyimage.com/80x80/444/ddd" class="rounded-circle">
                            </div>
                            <div class="col-12 text-center">
                                <h2 class="my-2">{{ $project->title }}</h2>
                            </div>
                            <div class="col-12">
                                <div class="row px-2">
                                    <div class="col-6 col-lg-3 text-center px-1">
                                        <h3>@lang('luba::ui.project_created_at')</h3>
                                        <p>{{ $project->firstCommit }}</p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-1">
                                        <h3>@lang('luba::ui.project_last_sync')</h3>
                                        <p>{{ $project->lastSync }}</p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-1">
                                        <h3>@lang('luba::ui.project_client')</h3>
                                        <p>{{ $project->client }}</p>
                                    </div>
                                    <div class="col-6 col-lg-3 text-center px-1">
                                        <h3>@lang('luba::ui.project_last_update')</h3>
                                        <p>{{ $project->lastUpdate }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-right mb-3">
                                <a href="{{ route('luba::projects.manage', $project->encodedId) }}" class="btn btn-primary">
                                    @lang('luba::ui.project_manage')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <luba-side-card class="col-md-4" title="luba::forms.project_search">
            <form action="index.html" method="post">
                <luba-input-text name="title" label="search.project_title"/>
                <luba-select
                    name="project_id"
                    label="search.project_title"
                    key="id"
                    value="title"
                    :options="$projects"/>
                <luba-form-buttons align="right">
                    <button type="submit" class="btn btn-primary">
                        @lang('luba::forms.project_search')
                    </button>
                </luba-form-buttons>
            </form>
        </luba-side-card>
    </div>
@stop
