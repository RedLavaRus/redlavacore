<?php

namespace Core\Values;
/*
    класс значений и формирования структуры страницы
    */
class Val
{
    public static $pre_head;
    public static $head;
    public static $post_head;

    public static $pre_body;
    public static $body;
    public static $post_body;
    
    public static $pre_footer;
    public static $footer;
    public static $post_footer;

    public static $errors;
    public static $er;



    public static function addHead($var,$type = null)
    {
        if($type == "pre")  {self::$pre_head .= $var; return;}
        if($type == null)   {self::$head .= $var; return;}
        if($type == "post") {self::$post_head .= $var; return;}
        self::$errors = "Ошибка класс Core\Values\Val функция addHead";
    }
    public static function addBody($var,$type = null)
    {
        if($type == "pre")  {self::$pre_body .= $var; return;}
        if($type == null)   {self::$body .= $var; return;}
        if($type == "post") {self::$post_body .= $var; return;}

        self::$errors = "Ошибка класс Core\Values\Val функция addBody";
    }
    public static function addFooter($var,$type = null)
    {
        if($type == "pre")  {self::$pre_footer .= $var; return;}
        if($type == null)   {self::$footer .= $var; return;}
        if($type == "post") {self::$post_footer .= $var; return;}

        self::$errors = "Ошибка класс Core\Values\Val функция addFooter";
    }


    public static function returnHead($type = null)
    {
        if($type == "pre")  {return self::$pre_head;}
        if($type == null)   {return self::$head;}
        if($type == "post") {return self::$post_head;}

        self::$errors = "Ошибка класс Core\Values\Val функция returnHead";
    }
    public static function returnBody($type = null)
    {
        if($type == "pre")  {return self::$pre_body;}
        if($type == null)   {return self::$body;}
        if($type == "post") {return self::$post_body;}

        self::$errors = "Ошибка класс Core\Values\Val функция returnBody";
    }
    public static function returnFooter($type = null)
    {
        if($type == "pre")  {return self::$pre_footer;}
        if($type == null)   {return self::$footer;}
        if($type == "post") {return self::$post_footer;}

        self::$errors = "Ошибка класс Core\Values\Val функция returnFooter";
    }
}

?>