<?php

namespace Core\Show;


/*
В обработчик поступает запись соответсвий 
url - модуль - класс - контролер
*/
class View
{
    public static $var;
    public function add($name,$values)
    {
        self::$var[$name] = $values;
    }
    public function view($temp)
    {
        $var = self::$var;
        include_once $_SERVER['DOCUMENT_ROOT'].$temp;
    }
    
}