<?php

namespace GRG\Luba\Models\Relationships;

trait CommitRelationships
{
    public function project ()
    {
        return $this->belongsTo('GRG\Luba\Models\Project');
    }
}
