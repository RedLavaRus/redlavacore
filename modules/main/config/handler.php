<?php
namespace Modules\Main\Config;

class Handler
{
    
    public function index()
    {
        $value="index";
        $result = new \Core\Show\View;
        
        $result->add("name_param", $value);
        $result->view("/modules/main/view/front/index.php");
    }
}