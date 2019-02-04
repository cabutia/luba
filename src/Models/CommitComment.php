<?php

namespace GRG\Luba\Models;

class CommitComment extends LubaModel
{
    protected $fillable = [
        'user_id',
        'body',
        'created_at'
    ];

    public function commit ()
    {
        return $this->belongsTo('GRG\Luba\Models\Commit');
    }
}
