<?php


use Bramus\Router\Router;

class RouteManager extends Manager
{
    protected const NAME_MANAGER = "RouteManager";

    private static Router $Router;

    static function Router(Router $Router)
    {
        self::$Router = $Router;


        $Router->get("/", function () {
            ViewsManager::GetView("index");
        });

        $Router->get("/admin", function () {
            ViewsManager::GetView("admin");
        });

        if (!GlobalManager::CheckInstalled())
        {
            $Router->get("/install", function () {
                ViewsManager::GetView("install");
            });
        }

        $Router->post("/action", function () {
            ActionManager::InputAction($_POST);
        });

        $Router->get("/viewinfo", function () {
            ViewsManager::GetView("viewinfo");
        });



        self::Run();
    }

    public static function mySelf($fn,Router $Router)
    {
        $fn($Router);
    }

    static private function Run()
    {
        self::$Router->run();
    }
}