<?php


use Bramus\Router\Router;

class RouteManager extends Manager
{
    static function Router(Router $Router)
    {
        $Router->get("/", function () {
            print "Hello";
        });

        $Router->run();
    }
}