<?php

namespace Core\Security;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Security
{
    public static function checkAuth()
    {
        if(!isset($_SESSION["id"]) or ($_SESSION["id"] < 1))
        {
            die("auth!");
        }
    }
}