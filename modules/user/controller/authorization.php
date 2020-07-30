<?php
namespace Modules\User\Controller;

use Core\Orm\Orm as Orm;

class Authorization
{
    
    public function index($url)
    {
        if($url["post"] != null){
            $login = $url["post"]["login"];
            $pass = $url["post"]["password1"];
            
            $check = new \Modules\User\Modules\Check;
            $pass = $check->hashing($login, $pass);
            $orm = new Orm;
            $orm->select("id")
            ->where("
              login = $login, 
              password = $pass"
              )->from("users")->execute()->object();
            
              if($orm->object[0]["id"] >= 1){
                $_SESSION["id"] = $orm->object[0]["id"];
                $url["post"] = null;
        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/authorizationsuspent.php");
              }
            
        };

        if(isset($_SESSION["id"]) && $_SESSION["id"] >= 1)
        {
          //вход выполнен
        }else{
          $result = new \Core\Show\View;  
          $result->add("name_param", 2);
          $result->view("/modules/user/view/front/authorization.php");

        }
    }
}