@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_requests"
        :route="route('luba::projects.manage.requests', $project->encodedId)"/>
    <h1>Requests</h1>
@stop
