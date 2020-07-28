<?php
namespace Modules\User\Modules;

use \CFG;
use Core\Values\Val as Val;
use Core\Orm\Orm as Orm;

class Check
{
    public function  chech($post)
    {
        //var_dump($post);
        $res1 = $this->login($post["login"]);
        //var_dump($res1);
        
    }
   /*
    Обработчик логина
    */
    public function login($login)
    {
        if(strlen($login) < CFG::$minimum_login) {
            Val::$er = "Минимальная длинна логина ".CFG::$minimum_login." символа";
            return false;
        }
        if(strlen($login) > 16) {
            Val::$er = "Максимальная длинна логина 16 символов";
            return false;
        }
        return $this->checkLogin($login);
        
    }
/*
    Проверка логина на уникальность
    */
    public function checkLogin($login)
    {
        $dd = new Orm();
        $ld = $dd -> select("id")
        ->from("users")
        ->where("login = ".$login)
        ->execute()->object();

        if($ld->object == null) return "ok";
        Val::$er = "Логин занят";
        return false;
    }
}