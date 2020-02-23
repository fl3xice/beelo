<?php


use Bramus\Router\Router;

$Router = new Router();

$Router->get("/a", fn () => print "Hi");

$Router->run();

