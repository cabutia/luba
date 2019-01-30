<?php

namespace GRG\Luba\Controllers;

use GRG\Luba\Models\Project;
use Illuminate\Http\Request;

class ProjectsController
{
    public function index ()
    {
        // $projects = Project::where('public', true)->get();
        $projects = Project::all();
        return view('luba::projects.index')
            ->with(compact('projects'));
    }

    public function detail ($id)
    {
        $project = Project::findEncoded($id);
        $commits = $project->commits()->paginate(5);
        return view('luba::projects.detail')
            ->with(compact('project', 'commits'));
    }
}
