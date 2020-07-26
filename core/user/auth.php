<?php

namespace Core\User;

use \CFG;
use \Core\Values\Val as Val;

/*
В обработчик поступает запись соответсвий 
url - модуль - класс - контролер
*/
class Auth
{
    public function auth($login,$pass,$ip)
    {
        $class = "\\Core\\User\\" . CFG::$auth_type;
        $cl = new $class;
        $cl->auth($login,$pass,$ip);  
        
    }
}