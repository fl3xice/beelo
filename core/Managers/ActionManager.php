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
            case "TestConnection":
                $mysqli = mysqli_connect($Action['db_ip'],$Action['db_user'],$Action['db_password'],$Action['db_name'],$Action['db_port']);
                if (!$mysqli)
                {
                    die(header("HTTP/1.0 401 Unauthorized"));
                } else {
                    print "Successful";
                }
                break;
            case  "Connection":
                $mysqli = mysqli_connect($Action['db_ip'],$Action['db_user'],$Action['db_password'],$Action['db_name'],$Action['db_port']);
                if (!$mysqli)
                {
                    die(header("HTTP/1.0 401 Unauthorized"));
                } else {
                    file_put_contents("core/installed", json_encode($Action));
                    print "Successfully";
                }
                break;
        }
    }
}