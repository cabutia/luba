<?php

namespace GRG\Luba\Models\ExtraAttributes;

trait ProjectExtraAttributes
{
    /**
     * Gets the last commit made on the project. It's just for help, you can do
     * it by using the relationship $this->commits and building your own query.
     *
     * @return GRG\Luba\Models\Commit
     */
    public function getLastCommitAttribute ()
    {
        return $this->commits()->orderBy('date', 'DESC')->first();
    }

    /**
     * Gets the contributor with most commits on the project. Again, you can
     * build your own query, it's just as a helper.
     *
     * @return String
     */
    public function getTopContributorAttribute ()
    {
        $contributors = [];
        $topContributor = ['author' => '','commits' => 0];
        $maxCommits = 0;

        // If there's no commits, then return "No commits" string.
        if ($this->commits->count() === 0) {
            return "No commits.";
        }

        // Loops through commits, and then add a point to each colaborator.
        foreach ($this->commits as $commit) {
            $contributors[$commit['author']] =
                isset($contributors[$commit['author']])
                ? $contributors[$commit['author']] + 1
                : 1;
        }

        // Again, loop through commits, and then assign the value to
        // the $topContributor value if count > $topContributor['commits']
        foreach ($contributors as $contributor => $commits) {
            if ($topContributor['commits'] < $commits) {
                $topContributor['author'] = $contributor;
                $topContributor['commits'] = $commits;
            }
        }

        // Format: <AuthorName> (<CommitCount>)
        return $topContributor['author'] . ' ('. $topContributor['commits'] .')';
    }
}
