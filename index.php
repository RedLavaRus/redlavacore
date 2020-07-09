<?php

include_once __DIR__."/core/core.php";


use CFG;
use Core\Orm\Orm;

CFG::debag(true);

$Orm = new Core\Orm\Orm;
//$Orm->select("id, name")->execute()->fetch();//

//INSERT INTO `category` SET `parent` = :parent, `name` = :name

//var_dump($Orm);

//$dd = $Orm->insert("name = name23, id = 323")->from("test")->execute();//->object();
//$dd
var_dump("<pre>",$dd,"</pre>");
//->execute()->fetch()->object();
 


?>