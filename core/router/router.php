<?php

namespace Core\Router;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

/*
   Класс роутер, отвечает за перенапревление к классу согласно урлки
    */
class Router
{
    /*
    Функция установки роутера
    */
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
    /*
    Перенаправление на страницу с окончанием в юрл на слеш
    */
    public static function redirectToSlash($url)
    {
        $url_timed = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $array_pre_slash = explode("?",$url_timed);
        if(substr($array_pre_slash["0"], -1)  != "/"){
            header('Location: '.self::createRedirectUrl($url).' '); die();
        }
        return;
    }
/*
    Переадресация
    */
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

/*
   Функция перенаправления и запуска класса
    */
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
        $dd -> select("class,func")
        ->from("router")
        ->where("url = ".$res_url)
        ->execute()->object();

        if(!isset($dd->object[0]) or $dd->object[0] == null) \Core\Errors\E404::show();

        return $dd->object[0];
    }
    /*
    Запуск страницы установки
    */
    public static function instails()
    {
        include $_SERVER['DOCUMENT_ROOT']."/install.php";
        die();
    }
}