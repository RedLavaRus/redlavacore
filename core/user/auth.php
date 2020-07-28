<?php

namespace Core\User;

use \CFG;
use \Core\Values\Val as Val;

/*
    класс обработки автоизации
    */
class Auth
{
    /*
   Способ авторизации
    */
    public function auth($login,$pass,$ip)
    {
        $class = "\\Core\\User\\" . CFG::$auth_type;
        $cl = new $class;
        $cl->auth($login,$pass,$ip);  
        
    }
}