<?php
namespace Modules\Telecom\Modules\Ajax;

use Core\Orm\Orm as Orm;

class Tv
{
    public function index($url)
    {

       $is_id =  $url["get"]["tp"];

       
        //var_dump($is_id);
        $result = new \Core\Show\View;
        $result->add("tps", $is_id);
        $result->view("/modules/telecom/view/ajax/tv.php");
    }
}