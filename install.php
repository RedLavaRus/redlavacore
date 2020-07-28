<?php
//install core
//$i = new \Core\Router\Router;
//$i -> install();
//unset($i);
echo 1;
$i = new \Modules\User\Config\Init;
$i -> install();
unset($i);
//install modules


?>