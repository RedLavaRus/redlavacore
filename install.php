<?php
echo 1;
//install core
//$i = new \Core\Router\Router;
//$i -> install();
//unset($i);
//$i = new \Modules\User\Config\Init;
//$i -> install();
//unset($i);Seo
//$i = new \Core\Seo\Seo;Modules\Index\Config
//$i -> install();
//unset($i);
//install modules
//$i = new \Modules\Telecom\Config\Init;
//$i -> install();
//$i = new \Modules\Blocks\Config\Init;
//$i -> install();
//$i = new \Modules\News\Config\Init;
//$i -> install();
$i = new \Core\User\Init;
$i -> install();
//unset($i);


?>