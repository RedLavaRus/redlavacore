<?php

namespace Core\User;

use \CFG;
use \Core\Values\Val as Val;
use Core\Orm\Orm as Orm;

class Register
{
    public $error;

    public function index($url)
    {
        $result="";
        if(isset($url["get"]["go"]) && $url["get"]["go"] == "reg"){
            $result = $this->getReg($url);
        }
        $this->showRegister($result);
    }
    public function getReg($url)
    {
        
        $this->cheakLogin($url["post"]["username"]);
        $this->cheakPass($url["post"]["password"],$url["post"]["password2"]);
        $this->cheakMail($url["post"]["email"]);
        if($this->error == null){
            $this->actionRegs($url);
            $this->showRegisterSus();
            die();
        }else{
            $this->showRegister();
        }
    }
    public function cheakLogin($login)
    {
        if(strlen($login) < 4) $this->error["login"][] = "Длинна логина менее 4 символов";
        if(strlen($login) >= 17) $this->error["login"][] = "Длинна логина болеее 16 символов";
        $this->cheakFreeLogin($login);
    }
    public function cheakPass($pass,$pass2)
    {
        if($pass != $pass2) $this->error["pass"][] = "Пароли не совпадают";
        if(strlen($pass) < 6) $this->error["pass"][] = "Длинна пароля менее 6 символов";
        if(strlen($pass) >= 21) $this->error["pass"][] = "Длинна пароля болеее 20 символов";
    }
    public function cheakMail($mail)
    {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))$this->error["mail"][] = "Указан неверный почтовый ящик";
    }
    public function cheakFreeLogin($login)
    {
        $orm = new Orm;
        $log = $orm->select("id")
                ->where("
                login = ".$login."
                "
                )->from("user")->execute()->object();

        $x=0;
        foreach($log->object as $test) {
            $x++;
        }
        if($x != 0) $this->error["login"][] = "Логин занят!";
      
    }
    public function actionRegs($url)
    {
        $login = $url["post"]["username"];
        $pass = $this->getHashPass($url["post"]["password"],$login );
        $email = $url["post"]["email"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $dates = time();

        $orm = new Orm;
        $orm->insert("
            login = $login,
            pass = $pass,
            email = $email,
            ip_reg = $ip,
            ip_lust_auth = null,
            date_reg = $dates,
            date_lust_auth = null
        ")            
        ->from("user")->execute();
    }
    public function showRegister()
    {
        $result = new \Core\Show\View;
        $result->add("res",$this->error);
        $result->view("/core/user/view/register.php");
    }
    public function showRegisterSus()
    {
        $result = new \Core\Show\View;
        $result->add("res",$result);
        $result->view("/core/user/view/registersys.php");
    }
    public function getHashPass($pass,$login)
    {
        $hash =  hash('sha256', $pass);
        $hash = $hash.$login;
        $hash =  hash('sha256', $hash);
        $hash = $hash.hash('sha256', $login).CFG::$salt;
        $hash =  hash('sha256', $hash);
        return $hash;
    }
}