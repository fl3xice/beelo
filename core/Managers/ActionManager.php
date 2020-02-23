<?php


class ActionManager extends Manager
{
    protected const NAME_MANAGER = "ActionManager";

    private static AirManager $airmanager;

    public static function InputAction($post)
    {
        self::$airmanager = new AirManager(["Action" => $post['action']]);

        $Action = base64_decode((string)self::$airmanager->getVariable("Action"));

        if (!empty($Action))
        {
            $Action = json_decode($Action, true);
            self::Actions($Action);
        } else {
            throw new Exception("Empty Action", "404");
        }
    }

    private static function Actions($Action)
    {
        switch ($Action['name'])
        {
            case "PrintPhpInfo":
                print phpinfo();
                break;
        }
    }
}