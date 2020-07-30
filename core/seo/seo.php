<?php

namespace Core\Seo;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;


class Seo
{
    /*
    Функция установки сео даты
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
    public function index($url)
    {
        //Добавление сео данных
    }
}