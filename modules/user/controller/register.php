<?php
namespace Modules\User\Controller;

use Core\Orm\Orm as Orm;

class Register
{
    
    public function index($url)
    {
        if($url["post"] != null){
            $check = new \Modules\User\Modules\Check;
            $check_data = $check->chech($url["post"]);
            $check_data["post"] = $url["post"];
            
            $this->getRegister($check_data);
            
        };
        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/register.php");
    }
    public function getRegister($check_data)
    {
        $error = null;
        var_dump("<pre>",$check_data,"</pre>");
        foreach($check_data["res"] as $res){
            if($res != "ok") $error = "error!";
        }
        if($error != "error!")
        {
                $login = $check_data["post"]["login"];
                $pass = $check_data["hash"];
                $mail = $check_data["post"]["mail"];
            
                $date = time();
                $ipuser = $this-> getIP();

                $orm = new Orm;
                $orm ->insert("
                login = $login, 
                password = $pass, 
                email = $mail, 
                ip_reg = $ipuser, 
                date_reg = $date
                ")->from("users")->execute();
                echo 1;

        }
    }
    public function getIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
          $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
          $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}