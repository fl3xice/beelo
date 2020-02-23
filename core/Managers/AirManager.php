<?php

/*
 *
 * AirManager
 *
 * Designed for storing and maintaining variables within yourself
 *
 * v 1.0.0
 */

class AirManager extends Manager
{
    protected const NAME_MANAGER = "AirManager";

    private array $variables = [];

    public function __construct($vars = [])
    {
        $this->variables = $vars;
    }

    public function getVariable($id)
    {
        return $this->variables[$id];
    }

}