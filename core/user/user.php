<?php

namespace Core\User;
use \CFG;
use Core\Values\Val as Val;

/*
   Модуль пользователей
    */
class User
{
    /*
    Обработчик логина
    */
    public function login($login)
    {
        if(strlen($login) < CFG::$minimum_login) {
            Val::$er = "Минимальная длинна пароля ".CFG::$minimum_login." символа";
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
        $ld = $dd -> select("*")
        ->from("user_def")
        ->where("login = ".$login)
        ->execute()->object();

        if($ld[0] == null) return "ok";
        Val::$er = "Логин занят";
        return false;
    }
}