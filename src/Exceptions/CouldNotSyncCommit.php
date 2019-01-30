<?php

namespace GRG\Luba\Exceptions;

use Exception;

class CouldNotSyncCommit extends Exception
{

    public function __construct ($commit, $exception)
    {
        $this->message = sprintf("Commit %s could not be synced:. %s", $commit->getSha(), $exception->getMessage());
    }
}
