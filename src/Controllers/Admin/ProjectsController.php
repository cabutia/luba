<?php

namespace GRG\Luba\Controllers\Admin;

use Illuminate\Http\Request;

class ProjectsController
{

    public function __construct ()
    {
        // TODO: This controller must only be accessed by administrators.
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
            'title' => 'required|string|min:8',
            'description' => 'nullable|string',
            'path' => 'nullable|string',
            'image' => 'nullable|image'
        ]);
        dump($data);
    }
}
