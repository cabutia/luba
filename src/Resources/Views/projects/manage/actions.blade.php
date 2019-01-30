@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_actions"
        :route="route('luba::projects.manage.actions', $project->encodedId)"/>
    <h1>Actions</h1>
@stop
