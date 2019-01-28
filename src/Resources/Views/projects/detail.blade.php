@extends('luba::projects._master')
@section('page.title', 'Project detail: ' . $project->title)
@section('detail')
    <div class="row">
        <div class="col-md-6 pt-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Commits</h5>
                </div>
                <div class="col float-right text-right">
                    @if (!$commits->onFirstPage())
                        <a href="{{ $commits->url(0) }}" class="btn btn-sm btn-default">
                            <i class="fa fa-angle-double-left"></i>
                        </a>
                        <a href="{{ $commits->previousPageUrl() }}" class="btn btn-sm btn-default ">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    @endif
                    @if ($commits->hasMorePages())
                        <a href="{{ $commits->nextPageUrl() }}" class="btn btn-sm btn-default ">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="{{ $commits->url(ceil($project->commits()->count() / $commits->perPage())) }}" class="btn btn-sm btn-default ">
                            <i class="fa fa-angle-double-right"></i>
                        </a>
                    @endif
                </div>
            </div>
            <hr>
            <table style="max-width:100%">
                <tbody>
                    @foreach ($commits as $commit)
                        <tr>
                            <th style="vertical-align:top;max-height:1rem;">
                                {{ $commit->shortHash }}
                            </th>
                            <td>
                                <span style="display:inline-block;max-height:1.2rem;overflow:hidden">
                                    {{ $commit->description }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6 pt-3">
            <div class="row">
                <div class="col">
                    <h5 class="mb-0">Abstract</h5>
                </div>
                <div class="col float-right text-right">
                    <a href="#" class="btn btn-sm btn-default">
                        <i class="fa fa-info"></i>
                    </a>
                </div>
            </div>
            <hr>
            <table>
                <tbody>
                    <tr>
                        <th class="pr-3">Total commits</th>
                        <td>{{ $project->commits->count() }}</td>
                    </tr>
                    <tr>
                        <th class="pr-3">Last commit date</th>
                        <td>{{ $project->lastCommit->date }}</td>
                    </tr>
                    <tr>
                        <th class="pr-3">Last commit hash</th>
                        <td>{{ $project->lastCommit->shortHash }}</td>
                    </tr>
                    <tr>
                        <th class="pr-3">Last commit message</th>
                        <td>{{ $project->lastCommit->description }}</td>
                    </tr>
                    <tr>
                        <th class="pr-3">Top contributor</th>
                        <td>{{ $project->topContributor }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop
