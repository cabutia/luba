<?php

namespace GRG\Luba\Models\Relationships;

trait ProjectRelationships
{
    public function commits ()
    {
        return $this->hasMany('GRG\Luba\Models\Commit')->orderBy('date', 'DESC');
    }

    public function branches ()
    {
        return $this->hasMany('GRG\Luba\Models\Branch');
    }
}
