@extends('luba::projects.manage._master')
@section('detail.project_management')
    <luba-breadcrumb
        title="luba::navigation.project_details"
        :route="route('luba::projects.manage.details', $project->encodedId)"/>
    <h1>Detail</h1>
@stop
