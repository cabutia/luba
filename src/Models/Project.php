<?php

namespace GRG\Luba\Models;

use GRG\Luba\Models\Relationships\ProjectRelationships;
use GRG\Luba\Models\ExtraAttributes\ProjectExtraAttributes;

class Project extends LubaModel
{
    use ProjectRelationships,
        ProjectExtraAttributes;

    protected $fillable = [
        'title',
        'description',
        'path',
        'image',
        'public',
    ];
}
