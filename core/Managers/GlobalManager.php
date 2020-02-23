<?php


class GlobalManager extends Manager
{
    protected const NAME_MANAGER = "GlobalManager";

    public static function CheckInstalled()
    {
        if (empty(file_get_contents("core/installed")))
            return false;
        else
            return true;
    }
}