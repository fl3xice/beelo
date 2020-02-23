<?php

function assets($url, $prefolder = "admin")
{

    return "Views/".$prefolder."/".$url;

}

function generateActionKey(array $action = ["name" => "PrintPhpInfo"])
{
    return base64_encode(json_encode($action));
}