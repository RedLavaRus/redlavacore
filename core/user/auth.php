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
    public function index($url)
    {
        //var_dump($url);
        //if($url["post"] == null) echo "fhndskjhjf";
        $result = new \Core\Show\View;
        //$result->add("param_auth", $tpres);
        $result->view("/core/user/view/login.php");
    }
    public function auth($login,$pass,$ip)
    {
        $class = "\\Core\\User\\" . CFG::$auth_type;
        $cl = new $class;
        $cl->auth($login,$pass,$ip);  
        
    }
}