<?php

namespace GRG\Luba\Models;

class CommitPreview extends LubaModel
{
    protected $fillable = [
        'url',
    ];

    protected $appends = [
        'path'
    ];

    protected $visible = [
        'path'
    ];

    public function getPathAttribute ()
    {
        return asset(config('luba.assets.uploaded_images') . 'commit_preview_' . $this->url . '.jpg');
    }

    public function commit ()
    {
        return $this->belongsTo('GRG\Luba\Models\Commit');
    }
}
