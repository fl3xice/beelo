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
    private array $variables = [];

    public function __construct($vars = [])
    {
        $this->variables = $vars;
    }

    public function getVariable($id): array
    {
        return $this->variables[$id];
    }

}