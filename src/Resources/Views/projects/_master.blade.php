@extends('luba::layouts.master')
@section('content')
    <luba-breadcrumb
        title="luba::navigation.projects"
        :route="route('luba::projects.index')"/>
    @yield('detail')
@stop
