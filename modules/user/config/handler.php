<?php
namespace Modules\User\Config;

class Handler
{
    
    public function index($url)
    {
        $value="index";
        $result = new \Core\Show\View;        
        $result->add("name_param", $value);
        $result->view("/modules/user/view/front/temp.php");
    }
    public function register($url)
    {
        $result = new \Modules\User\Controller\Register;  
        $result -> index($url);

    }
    public function authorization()
    {
        
        $result = new \Core\Show\View;  
        $result->add("name_param", 2);
        $result->view("/modules/user/view/front/authorization.php");
    }
}