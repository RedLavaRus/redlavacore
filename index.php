<?php

include_once __DIR__."/core/core.php";


use CFG;
use Core\Orm\Orm;

CFG::debag(true);
/*
Select * from table
Select id from table
Select id,name from table

Select * from table Where id=1
Select id from table Where id = 1 , name = name1
Select id,name from table Where id = 1 , name = name1

Select * from table limit 1

------------------------------



*/
$Orm = new Core\Orm\Orm("test");
$Orm->select("id, name")->execute()->fetch();

//INSERT INTO `category` SET `parent` = :parent, `name` = :name

//var_dump($Orm);
 


?>