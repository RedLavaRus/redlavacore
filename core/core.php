<?php
spl_autoload_register(function ($class_name) {
	$class_name = str_replace('\\','/',$class_name);
    $class_name = mb_strtolower($class_name );
    include_once dirname(__DIR__)."/".$class_name . '.php';
});



?>