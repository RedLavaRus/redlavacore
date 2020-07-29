<?php
namespace Modules\User\Controller;

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
        var_dump("<pre>",$check_data,"</pre>");
    }
}