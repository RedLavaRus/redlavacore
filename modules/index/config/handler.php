<?php
namespace Modules\Index\Config;

class Handler
{
    
    public function index()
    {
        $value="index";
        $result = new \Core\Show\View;
        
        $result->add("name_param", $value);
        $result->view("/modules/index/view/front/index.php");
    }
}