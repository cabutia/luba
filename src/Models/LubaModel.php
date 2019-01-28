<?php

namespace GRG\Luba\Models;

use Illuminate\Database\Eloquent\Model;

class LubaModel extends Model
{

    protected $prefix = null;

    public function __construct ($attributes = [])
    {
        $config = config('luba.database');
        $prefix = $config['prefix'];
        $suffix = $config['suffix'];
        $this->table = $prefix . $this->getTable() . $suffix;
        parent::__construct($attributes);
    }
}
