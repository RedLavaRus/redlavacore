<?php

namespace Core\Event;


use \CFG;
use \Core\Func\URL as URL;
use \Core\Router\Router as Router;

class Manager
{
    public function start()
    {
        $this->debag();
        $this->connectLib();
        Router::redirectToSlash();
        $url = URL::urlToArray();
        //Router::rout($url);
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
    public function redirectToSlash()
    {

    }
}
?>