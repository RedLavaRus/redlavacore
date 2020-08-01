<?php

namespace Core\Event;


use \CFG;
use \Core\Func\URL as URL;
use \Core\Router\Router as Router;
use \Core\Values\Val as Val;
use Core\Seo\Seo as Seo;
  /*
  Менеджер, отвечает за порядок запуска функций
  */
class Manager
{  
    /*
    Функция старт, отвечает за порядок запуска функций в движке
    */
    public function start()
    {
        session_start();//Запуск сессии
        $this->debag();//запуск дебагера
        $url = URL::urlToArray();
        $this->connectLib($url);// подключение библиотек
        Router::redirectToSlash($url);// перенаправление с url на url/
        $seo = new Seo;
        $seo->index($url);
        $obj_class_fun = Router::rout($url); // Получение класса и функции запускаемого экземпляра
        $this->run($obj_class_fun,$url);//Выполнения класса
    }

/*
    Включение дебага
    */
    public function debag()
    {
        CFG::debag(CFG::$debag);
        return $this;
    }

/*
    Подключение библеотек в страницу, согласно типу страници
    */
    public function connectLib($url)
    {
        switch ($url["url"]["0"]){
            case "admin":
                $var_head = '
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <link rel="stylesheet" href="/res/css/admin.css">
                ';

                break;
            case "lk":
                break;
            default:
            $var_head = 
            //<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            // '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            '           
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <link rel="stylesheet" href="/res/css/default.css">
            
            ';
        }
        Val::addHead($var_head);
    }

/*
    Запуска класса и функции
    */
    public function run($run,$url)
    {
        $class_name = $run["class"];
        $function_name =$run["func"];
        $class_is = new $class_name;
        $class_is -> $function_name($url);

    }
}
?>