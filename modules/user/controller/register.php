<?php
namespace Modules\User\Controller;

class Register
{
    
    public function index($url)
    {
        if($url["post"]!=null){
            $check = new \Modules\User\Modules\Check;
            $check->chech($url["post"]);
        };
        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/register.php");
    }
}