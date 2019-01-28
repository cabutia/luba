<?php

trait IsLubaUser
{
    public function isLubaAdmin ()
    {
        return true;
    }

    public function isLubaClient ()
    {
        return false;
    }
}
