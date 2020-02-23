<?php


use Bramus\Router\Router;

$Router = new Router();

$Router->get("/", function () {
    print "Hello";
});

$Router->run();

