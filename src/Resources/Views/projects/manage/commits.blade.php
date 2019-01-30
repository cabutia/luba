@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_commits"
        :route="route('luba::projects.manage.commits', $project->encodedId)"/>
    <h1>Commits</h1>
@stop
