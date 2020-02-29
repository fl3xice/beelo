<?php


class Checker extends Package
{
    public const NAME_PACKAGE = "Checker";
    public const VENDOR_PACKAGE = "FlexICE";
    public const VERSION_PACKAGE = "1.0";

    public static function IsFile($path)
    {
        if (file_exists($path))
            return true;
        else
            return false;
    }
}