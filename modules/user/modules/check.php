<?php
namespace Modules\User\Modules;

use \CFG;
use Core\Values\Val as Val;
use Core\Orm\Orm as Orm;

class Check
{
    public function  chech($post)
    {
        $res= null;
        var_dump("<pre>",$post,"</pre>");

        $res[] = $this->login($post["login"]);
        $res[] = $this->password($post["password1"],$post["password2"]);
        $res[] = $this->mail($post["mail"]);
        $hash =  $this->hashing($post["login"],$post["password1"]);

        var_dump($res);
        var_dump(Val::$er);
        
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
    public function password($pass1,$pass2)
    {
        $this->equivalent($pass1,$pass2);
        $this->passStrlen($pass1);
    }

    
    public function equivalent($pass1,$pass2)
    {
        if($pass1 != $pass2)
        {
            Val::$er = "Пароли не совпадают";
            return false;
        }
    }

    
    public function passStrlen($pass1)
    {
        if(strlen($pass1) > 40) {
            Val::$er = "Максимальная длинна пароля 40 символов";
            return false;
        }
        if(strlen($pass1) < CFG::$minimum_password) {
            Val::$er = "Минимальная длинна пароля ".CFG::$minimum_password." символов";
            return false;
        }
        return "ok";
    }

    
    public function mail($mail)
    {
        if(strlen($mail) < 6)
        {
            Val::$er = "Заполните почту";
            return false;
        }
        if( filter_var($mail, FILTER_VALIDATE_EMAIL) === false)
        {
            Val::$er = "формат почтового ящика неправильный";
            return false;
        }
        return "ok";
    }

    
    public function hashing($login, $pass)
    {
        $hash = strlen($login).$login.strlen($pass).hash('sha256', $pass);
        $hash = hash('sha256', $hash);
        $hash =  $login.$hash.strlen($pass).hash('sha256', $pass).hash('sha256', $login);
        $hash = hash('sha256', $hash);
        return $hash;
    }
}