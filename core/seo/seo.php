<?php

namespace Core\Seo;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
use Core\Values\Val as Val;


class Seo
{
    /*
    Функция установки сео даты
    */
    public function install()
    {
        $dd = new Create();
        $dd -> create("seo")
        ->add("url","VARCHAR","255","not null","Урл страницы")
        ->add("title","VARCHAR","255","not null","Класс страницы")
        ->add("keywords","VARCHAR","255","not null","Функия вызова")
        ->add("description","text","","","Описание");
        $dd ->execute();
    }
    public function index($url)
    {
        $title = "default title";
        $description = "default description";
        $keywords = "default keywords";
        //Добавление сео данных
        $var='
        <meta name="description" content="'.$description.'">
        <meta name="keywords" content="'.$keywords.'">
        <title>'.  $title  .'</title>
        ';   
    \Core\Values\Val::addHead($var,"pre");
    }
}