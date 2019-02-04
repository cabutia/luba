<?php

namespace GRG\Luba\Controllers\Admin;

use Illuminate\Http\Request;
use GRG\Luba\Models\Project;
use GRG\Luba\Classes\PSync;

class ProjectsController
{

    protected $config;

    public function __construct ()
    {
        // TODO: This controller must only be accessed by administrators.
        $this->config = config('luba');
    }

    /**
     * Renders the general project management view.
     * It's like the main index view, but with many administration options.
     * This view shows another kind of overview.
     *
     * @return View
     */
    public function management ()
    {
        $projects = Project::all();
        return view('luba::projects.management')
            ->with(compact('projects'));
    }

    /**
     * Renders the specific project management view.
     *
     * @return View
     */
    public function manage ($id)
    {
        return redirect(
            route('luba::projects.manage.details', $id)
        );
    }

    /**
     * Renders the project's details sub-view
     *
     * @return View
     */
    public function details ($id)
    {
        $project = Project::findEncoded($id);
        return view('luba::projects.manage.details')
            ->with(compact('project'));
    }

    /**
     * Renders the project's actions sub-view
     *
     * @return View
     */
    public function actions ($id)
    {
        $project = Project::findEncoded($id);
        return view('luba::projects.manage.actions')
            ->with(compact('project'));
    }

    /**
     * Renders the project's commits sub-view
     *
     * @return View
     */
    public function commits ($id)
    {
        $project = Project::with('commits')->find(Project::decode($id));
        return view('luba::projects.manage.commits')
            ->with(compact('project'));
    }

    /**
     * Renders the project's requests sub-view
     *
     * @return View
     */
    public function requests ($id)
    {
        $project = Project::findEncoded($id);
        return view('luba::projects.manage.requests')
            ->with(compact('project'));
    }

    /**
     * Renders the project's issues sub-view
     *
     * @return View
     */
    public function issues ($id)
    {
        $project = Project::findEncoded($id);
        return view('luba::projects.manage.issues')
            ->with(compact('project'));
    }

    /**
     * Renders the project add view.
     * From here, you can fill a form in order to add a new project to the
     * platform. By default, this project visibility will be publicitly hidden,
     * so you must review it and sync it before the client can see it.
     *
     * @return View
     */
    public function add ()
    {
        return view('luba::projects.add');
    }

    /**
     * Stores a project in the database.
     * Validates the project addition form and stores the new project into
     * the database. Again, by default it's hidden.
     */
    public function store (Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:8|unique:' . $this->config['database']['prefix'] . 'projects',
            'description' => 'nullable|string',
            'path' => 'nullable|string',
            'image' => 'nullable|image'
        ]);
        $project = Project::create($data);
    }

    /**
     * Syncs the project commits with the database.
     */
    public function sync (Request $request, $id)
    {
        $request->validate([
            'project_id' => 'required|string'
        ]);
        $project = Project::findEncoded($request->id);
        $psync = new PSync($project);
        $psync->sync();
        return redirect(route('luba::projects.manage.actions', $id))
            ->withSuccesses(__('luba::messages.success.project_sync_success'));
    }

    /**
     * Renders the edit project view.
     * @return View
     */
    public function edit ($id)
    {
        $project = Project::findEncoded($id);
        return view ('luba::projects.edit')
            ->with(compact('project'));
    }

    /**
     * Updates a project
     * @return View
     */
    public function update (Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'path' => 'required|string',
            'public' => 'required|boolean'
        ]);

        $project = Project::findEncoded($request->id);
        $project->update($data);
        return redirect(route('luba::projects.manage.details', $project->encodedId))
            ->withSuccesses(__('luba::messages.success.project_update_success'));
    }
}
