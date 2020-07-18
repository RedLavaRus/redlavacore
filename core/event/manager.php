<?php

namespace Core\Event;


use \CFG;
use \Core\Func\URL as URL;
use \Core\Router\Router as Router;

class Manager
{
    public function start()
    {
        $this->debag();//запуск дебагера
        $this->connectLib();// подключение библиотек
        $url = URL::urlToArray();
        Router::redirectToSlash($url);// перенаправление с url на url/
        $obj_class_fun = Router::rout($url); // Получение класса и функции запускаемого экземпляра
        $this->run($obj_class_fun);
    }

//Включение дебага
    public function debag()
    {
        CFG::debag(CFG::$debag);
        return $this;
    }

// Подключение библеотек
    public function connectLib()
    {

    }

//Запуск класса назначения
    public function run($run)
    {
        $class_name = $run["class"];
        $function_name =$run["func"];
        $class_is = new $class_name;
        $class_is -> $function_name();

    }
}
?>