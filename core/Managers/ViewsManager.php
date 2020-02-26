<?php


class ViewsManager extends Manager
{
    protected const NAME_MANAGER = "ViewsManager";

    private static function Views($NameView)
    {
        switch (strtolower($NameView))
        {
            case "index":
                return "Views/index.php";
                    break;
            case "admin":
                return "Views/admin/index.php";
                break;
            case "install":
                return "Views/install.php";
                break;
            case "viewinfo":
                return "Views/viewinfo.php";
                break;
        }
    }

    public static function GetView($NameView)
    {
        require_once self::Views($NameView);
    }


}