<?php

namespace GRG\Luba\Exceptions;

use Exception;

class PathDoesntExists extends Exception
{

    protected $project;

    public function __construct ($project)
    {
        $this->project = $project;
        $this->message = sprintf("The path %s doesn't exists.", $project->path);
    }
}
