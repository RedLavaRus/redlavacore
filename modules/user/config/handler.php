<?php
namespace Modules\User\Config;

class Handler
{
    
    public function index()
    {
        $value="index";
        $result = new \Core\Show\View;        
        $result->add("name_param", $value);
        $result->view("/modules/user/view/front/temp.php");
    }
    public function register()
    {

        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/register.php");
    }
    public function authorization()
    {
        echo 2;
    }
}