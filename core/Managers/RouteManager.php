<?php


use Bramus\Router\Router;

class RouteManager extends Manager
{

    private static Router $Router;

    static function Router(Router $Router)
    {
        self::$Router = $Router;

        $Router->get("/", function () {
            print "Hello";
        });

        self::Run();
    }

    static private function Run()
    {
        self::$Router->run();
    }
}