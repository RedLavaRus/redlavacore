<?php

namespace Core\Func;

class URL
{


    public static function urlToArray()
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $array = explode("/",$url);
        //echo $url;
        $end_add = "";
        if (end($array) == "") {
            array_pop($array);
        }
        if ((substr(end($array),0,1) != "?") and (end($array) != "")){
            $end_add = "/";
        }
        $rdd = array_pop($array);
        $rdd.=$end_add;
        array_push($array, $rdd);
        //var_dump($end);
        $dd = 0;
        foreach($array as $arr){
            $dd++;
            if($dd == 1) continue;
            if(substr($arr,0,1) == "?") continue;
                $res_arr[] =  $arr;    
        }
        
        $array_return["url"]    = $res_arr;
        $array_return["get"]    = $_GET;
        $array_return["post"]   = $_POST;
        return $array_return;
    }
}

?>