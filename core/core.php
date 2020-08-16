<?php
/*
    автоподключение классов
    */
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\','/',$class_name);
    //var_dump($class_name);
    $class_name = strtolower($class_name);
    include_once dirname(__DIR__)."/".$class_name . '.php';
});



?>