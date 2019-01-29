<?php

namespace GRG\Luba\Models\ExtraAttributes;

trait ProjectExtraAttributes
{
    /**
     * Gets the last commit made on the project. It's just for help, you can do
     * it by using the relationship $this->commits and building your own query.
     * @return GRG\Luba\Models\Commit
     */
    public function getLastCommitAttribute ()
    {
        return $this->commits()->orderBy('date', 'DESC')->first();
    }

    /**
     * Gets the contributor with most commits on the project. Again, you can
     * build your own query, it's just as a helper.
     * @return String
     */
    public function getTopContributorAttribute ()
    {
        $contributors = [];
        $topContributor = ['author' => '','commits' => 0];
        $maxCommits = 0;

        // If there's no commits, then return "No commits" string.
        if ($this->commits->count() === 0) {
            return null;
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

    /**
     * Returns the first commit
     * @return String
     */
    public function getFirstCommitAttribute ()
    {
        if ($this->commits->count() > 0) {
            return $this->commits()->orderBy('date', 'ASC')->first();
        }
        return __('luba::ui.no_data');
    }

    /**
     * Returns the last project's sync date string
     * @return String
     */
    public function getLastSyncAttribute ()
    {
        return $this->last_sync ?? __('luba::ui.no_data');
    }

    /**
     * Returns the project's assigned client name
     * @return String
     */
    public function getClientAttribute ()
    {
        // TODO: Attach to a client
        return __('luba::ui.no_data');
    }

    /**
     * Returns the project's last commit date
     * @return String
     */
    public function getLastUpdateAttribute ()
    {
        if ($this->commits->count() > 0) {
            return $this->commits()->orderBy('date', 'DESC')->first()->date;
        }
        return __('luba::ui.no_data');
    }

    /**
     * Returns the project's logo
     * If there's no logo, it will return a dummy image
     * @return String
     */
    public function getLogoAttribute ()
    {
        return $this->image
            ? asset($this->image)
            : $this->defaultLogo;
    }

    /**
     * Returns the project's default logo
     * If there's no logo provided, this is the one that will be shown
     * @return String
     */
    public function getDefaultLogoAttribute ()
    {
        return 'https://dummyimage.com/100/ddd/444';
    }

    /**
     * Returns the project's description
     * If there's no description, it will print an 'No description' text.
     * @return String
     */
    public function getSubtitleAttribute ()
    {
        return $this->description && !empty($this->description)
            ? $this->description
            : __('luba::ui.project_no_description');
    }

    /**
     * Returns an array with the routes needed for the 'manage' view tabs.
     * @return Array
     */
    public function getManageTabsAttribute ()
    {
        $id = $this->encodedId;
        return [
            [
                'route' => route('luba::projects.manage.details', $id),
                'title' => 'luba::ui.project_details'
            ],
            [
                'route' => route('luba::projects.manage.actions', $id),
                'title' => 'luba::ui.project_actions'
            ],
            [
                'route' => route('luba::projects.manage.commits', $id),
                'title' => 'luba::ui.project_commits'
            ],
            [
                'route' => route('luba::projects.manage.requests', $id),
                'title' => 'luba::ui.project_requests'
            ],
            [
                'route' => route('luba::projects.manage.issues', $id),
                'title' => 'luba::ui.project_issues'
            ]
        ];
    }
}
