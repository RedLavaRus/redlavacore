<?php
namespace Modules\User\Controller;

class Register
{
    
    public function index($url)
    {
        var_dump($url);
        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/register.php");
    }
}