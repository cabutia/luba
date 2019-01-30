<?php

namespace GRG\Luba\Classes;

use GitElephant\Repository;
use GRG\Luba\Models\Project;
use GRG\Luba\Exceptions\PathDoesntExists;
use GRG\Luba\Exceptions\PathIsNotRepository;

class PSync
{

    protected $project;
    protected $repository;
    protected $branches;
    protected $log;
    protected $currentBranch;
    protected $currentCommits;

    public $commitsAdded = 0;

    public function __construct (Project $project)
    {
        $this->project = $project;
    }

    /**
     * Try to sync the project commits
     * @return Boolean
     */
    public function sync()
    {
        $this->validatePath();
        $this->getRepository();
        $this->syncCommits();
        $this->syncBranches();

        // ONLY FOR DEVELOPMENT
        $this->debug();
    }

    /**
     * Validates if path exists
     * @return void
     */
    public function validatePath ()
    {
        if (! is_dir($this->project->path) ) {
            throw new PathDoesntExists($this->project);
        }
    }

    /**
     * Validates if the path, is a git repository
     * @return void
     */
    public function getRepository ()
    {
        $repository = Repository::open($this->project->path);
        $this->repository = $repository;
        $this->branches = $repository->getBranches();
        $this->currentBranch = $repository->getMainBranch();
        $this->log = $repository->getLog($this->currentBranch, null, $repository->countCommits());
        foreach ($this->log as $commit) {
            $this->currentCommits[] = $commit->getSha();
        }
    }

    /**
     * ONLY FOR DEVELOPMENT PURPOSES
     * @return void
     */
    protected function debug ()
    {
    }

    /**
     * Sync project commits
     * @param  array $repo
     * @param  Project $project
     * @return void
     */
    public function syncCommits ()
    {
        $existingCommits = [];
        if ($this->project->commits->count() > 0) {
            foreach ($this->project->commits as $commit) {
                $existingCommits[] = $commit->hash;
            }
        }

        $oldCommits = count($existingCommits);
        $readCommits = $this->repository->countCommits();
        $commitCountDiff = $readCommits - $oldCommits;

        if ($oldCommits === $readCommits) return true;

        foreach ($this->log as $commit) {
            if (!in_array($commit->getSha(), $existingCommits)) {
                try {
                    $this->project->commits()->create([
                        'hash' => $commit->getSha(),
                        'author' => $commit->getAuthor()->getName(),
                        'date' => $commit->getDatetimeAuthor()->format('Y-m-d h:i:s'),
                        'description' => $commit->getMessage()->toString()
                    ]);
                    $this->commitsAdded++;
                } catch (\Exception $e) {
                    throw new CouldNotSyncCommit($commit, $e);
                }
            }
        }
        return true;
    }

    /**
     * Sync project branches
     * @param  array $repo
     * @param  Project $project
     * @return void
     */
    public function syncBranches ()
    {
        $this->project->branches()->delete();
        foreach ($this->branches as $branch) {
            $this->project->branches()->create([
                'name' => $branch->getName(),
                'current' => $branch->getCurrent()
            ]);
        }
    }
}
