@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_issues"
        :route="route('luba::projects.manage.issues', $project->encodedId)"/>
    <h1>Issues</h1>
@stop
