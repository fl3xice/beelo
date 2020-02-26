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

    public static function CheckVersion()
    {
        if (phpversion()[0] == "7")
        {
            return true;
        } else {
            return false;
        }
    }

    public static function CheckHtaccess()
    {
        if (AirManager::getHtaccess() == "cb264521fee20dddbf702659312c49055e4916b7c4ade6c5396acb96e7e0223f")
        {
            return true;
        } else {
            return false;
        }
    }

    public static function CheckLicense()
    {
        if (hash_file("sha256","LICENSE") == "6f1e622c82a380075843bb084a7ec3b1f1d12a4a02526d75e78b0924a860aa75")
        {
            return true;
        } else {
            return false;
        }
    }
}