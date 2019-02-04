<?php

namespace GRG\Luba\Controllers\Admin;

use Auth;
use \Gumlet\ImageResize;
use GRG\Luba\Models\Commit;
use GRG\Luba\Models\CommitPreview;
use Illuminate\Http\Request;

class CommitsController
{
    public function addComment (Request $request)
    {
        $data = $request->validate([
            'id' => 'required|string',
            'body' => 'required|string'
        ]);

        $commit = Commit::findEncoded($request->id);
        $project = $commit->project;
        $commit->comments()->create([
            'user_id' => Auth::id(),
            'body' => $request->body
        ]);
        return redirect(route('luba::projects.manage.commits', $project->encodedId))
            ->withSuccesses(__('luba::messages.success.commit_comment_added'))
            ->with('selectedCommit', $commit->hash);
    }

    public function addPreview (Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'preview' => 'required|image'
        ]);

        $rand = str_replace('.', '', microtime(true));
        $name = 'commit_preview_' . $rand;
        $image = new ImageResize($request->preview);
        $image->save(public_path(config('luba.assets.uploaded_images') . $name . '.jpg'));

        $commit = Commit::findEncoded($request->id);
        $project = $commit->project;
        $commit->previews()->create([
            'url' => $rand
        ]);
        return redirect(route('luba::projects.manage.commits', $project->encodedId))
            ->with('selectedCommit', $commit->hash);
    }
}
