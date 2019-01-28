<?php

namespace GRG\Luba\Models\ExtraAttributes;

trait CommitExtraAttributes
{
    public function getShortHashAttribute ()
    {
        return substr($this->hash, 0, 7);
    }
}
