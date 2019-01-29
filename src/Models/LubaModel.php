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

    public function getEncodedIdAttribute()
    {
        return self::encode($this->id);
    }

    public static function findEncoded ($id)
    {
        $decodedId = self::decode($id);
        return self::find($decodedId);
    }

    public static function decode ($string)
    {
        $base64encoded = urldecode($string);
        return base64_decode($base64encoded);
    }

    public static function encode ($string)
    {
        $base64encoded = base64_encode($string);
        return urlencode($base64encoded);
    }
}
