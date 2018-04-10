<?php

namespace App\Models;

abstract class DBHConnect
{
    protected $DBH;

    function __construct()
    {
        $settingsDir = realpath(__DIR__ . '/../core');
        $configArray = include($settingsDir . DIRECTORY_SEPARATOR . 'config.php');
        $this->DBH = $configArray['DBH'];
    }
}