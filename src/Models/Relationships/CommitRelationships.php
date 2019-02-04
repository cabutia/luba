<?php

namespace GRG\Luba\Models\Relationships;

trait CommitRelationships
{
    public function project ()
    {
        return $this->belongsTo('GRG\Luba\Models\Project');
    }

    public function comments ()
    {
        return $this->hasMany('GRG\Luba\Models\CommitComment');
    }

    public function previews ()
    {
        return $this->hasMany('GRG\Luba\Models\CommitPreview');
    }
}
