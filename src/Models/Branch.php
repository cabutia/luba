<?php

namespace GRG\Luba\Models;

class Branch extends LubaModel
{
    protected $fillable = [
        'name',
        'project_id',
        'current'
    ];

    public function project ()
    {
        return $this->belongsTo('GRG\Luba\Models\Project');
    }
}
