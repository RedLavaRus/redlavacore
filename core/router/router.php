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
        ->add("Описание","text","","Описание","Описание адреса");
        $dd ->execute();
        echo "<pre>";
        var_dump($dd);
    }
    public static function redirectToSlash()
    {
        $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $array = explode("/",$url);
        $old = $array;
        $dddd="";
        $end_add = "";

        if (end($array) == "") {
            array_pop($array);
        }

        $rdd = array_pop($array);
        $rdd.=$end_add;
        array_push($array, $rdd);

        foreach($array as $r){            
            $dddd.= $r;
            if (substr($r,0,1) != "?")$dddd.= "/";
        }

        $redic  = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' .  $dddd;
        if($dddd != $url) header('Location: '.$redic.' ');

    }
    public static function rout($url)
    {
        $res_url="";
        foreach($url["url"] as $u){
            $res_url .= $u;
            if (end($url["url"]) != $u) $res_url .= "/";
        }

        $dd = new Orm();
        $dd -> select("*")
        ->from("router")
        ->where("url = ".$u);
        //->execute();//->object();
        echo "<pre>";
        var_dump($dd);
    }
}