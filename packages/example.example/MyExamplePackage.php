<?php


class MyExamplePackage extends Package
{
    public function getHost()
    {
        return $_SERVER['HTTP_HOST'];
    }
}