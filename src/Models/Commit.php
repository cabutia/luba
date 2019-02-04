<?php

namespace GRG\Luba\Models;

use GRG\Luba\Models\Relationships\CommitRelationships;
use GRG\Luba\Models\ExtraAttributes\CommitExtraAttributes;

class Commit extends LubaModel
{

    use CommitRelationships,
        CommitExtraAttributes;

    protected $fillable = [
        'hash',
        'author',
        'date',
        'description',
        'project_id'
    ];

    public $timestamps = false;
}
