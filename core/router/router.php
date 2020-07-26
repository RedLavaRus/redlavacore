<?php

namespace Core\Router;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

/*
В обработчик поступает запись соответсвий 
url - модуль - класс - контролер
*/
class Router
{
    public function install()
    {
        $dd = new Create();
        $dd -> create("router")
        ->add("url","VARCHAR","255","not null","Урл страницы")
        ->add("class","VARCHAR","255","not null","Класс страницы")
        ->add("func","VARCHAR","255","not null","Функия вызова")
        ->add("Описание","text","","","Описание");
        $dd ->execute();
    }
    public static function redirectToSlash($url)
    {
        $url_timed = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $array_pre_slash = explode("?",$url_timed);
        if(substr($array_pre_slash["0"], -1)  != "/"){
            header('Location: '.self::createRedirectUrl($url).' '); die();
        }
        return;
    }

    public static function createRedirectUrl($url)
    {
        $addres = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') .  '://' . $_SERVER['HTTP_HOST'] . "/";
        foreach($url["url"] as $u){
            $addres.=$u."/";
        }
        if (!empty($url["get"])) {
            $arr_key = array_keys($url["get"]);
            $arr_value =array_values($url["get"]);
            $x = 0;$get_arg="";
            while (isset($arr_key[$x])) {
                if($get_arg != "")$get_arg.="&";
                $get_arg .= $arr_key[$x] . "=".$arr_value[$x];
                $x++;
            }
            $addres.="?".$get_arg;
        }
        return $addres;
    }


    public static function rout($url)
    {
        if($url["url"][0] == "instal"){
            self::instails();
        }
        if(!isset($url["url"]) ) $url["url"][] = "/";
        $res_url="";
        foreach($url["url"] as $u){
            $res_url .= $u;
            if (end($url["url"]) != $u) $res_url .= "/";
        }
        $dd = new Orm();
        $dd -> select("*")
        ->from("router")
        ->where("url = ".$res_url)
        ->execute()->object();
        return $dd->object[0];
    }
    public static function instails()
    {
        include $_SERVER['DOCUMENT_ROOT']."/install.php";
        die();
    }
}