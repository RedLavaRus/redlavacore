<?php

namespace Core\User;

use \CFG;
use \Core\Values\Val as Val;
use Core\Orm\Orm as Orm;

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
        $result = new \Core\Show\View;
        if(isset($url["get"]["go"]) && $url["get"]["go"] == "auth"){
            $res = $this->getAuth($url);
            $result->add("res", $res);
        }  
        
        $result->view("/core/user/view/login.php");
    }
    public function getAuth($url)
    {
        $funct = new \Core\User\Register;
        $funct->cheakLogin($url["post"]["username"]);
        $funct->cheakPass($url["post"]["password"],$url["post"]["password"]);
        $pass = $funct->getHashPass($url["post"]["password"],$url["post"]["username"]);
        
        $orm = new Orm;
        $orm->select("id")
        ->where("login = ".$url["post"]["username"]." , pass =".$pass)
        ->from("user")->limit(1)->execute()->object();
        if(isset($orm->object[0]["id"]) and $orm->object[0]["id"]>= 1){
            $_SESSION["id"] = $orm->object[0]["id"];
            $result = new \Core\Show\View;
            $result->add("res","ecgtiyj");
            $result->view("/core/user/view/loginsys.php");
            die();
        }else{
            $funct->error["all"][] = "неверный логин или пароль!";
        }
        return $funct->error;
        
    }
}