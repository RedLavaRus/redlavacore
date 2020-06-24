<?php

include_once __DIR__."/config.php";
include_once __DIR__."/core/orm/orm.php";
use CFG;
use \Core\Orm\Orm as Orm ;

CFG::debag(true);

$Orm = new Orm;

$Orm-> AddColumn('test3',"t11w")->execute();
var_dump($Orm);
?>