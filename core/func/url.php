<?php

namespace Core\Func;

class URL
{

    //Преобразование юрл в массив.
    public static function urlToArray()
    {
        $url =  $_SERVER['REQUEST_URI'];
        $array_pre_slash = explode("?",$url);
        $array = explode("/",$array_pre_slash["0"]);
        $array_url = null;
        foreach($array as $ar)
        {
            if ($ar != "") {
                $array_url[] = $ar;
            }
        }
        
        if(isset($_GET)) $result_url["get"]  = $_GET;
        if(isset($_POST)) $result_url["post"]  = $_POST;
        $result_url["url"]  = $array_url;

        return $result_url;
    }
}

?>