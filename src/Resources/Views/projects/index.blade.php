@extends('luba::projects._master')
@section('detail')
    <div class="row">
        @forelse ($projects as $project)
            <div class="col-md-4 col-lg-3">
                <a
                    class="card"
                    href="{{ route('projects.detail', $project->id) }}">
                    <div class="card-body">
                        <p class="card-text">
                            <strong>{{ $project->title }}</strong><br>
                            {{ $project->description }}
                        </p>
                    </div>
                </a>
            </div>
        @empty
            <div class="col">
                <p>There are no projects yet</p>
            </div>
        @endforelse
    </div>
@stop
