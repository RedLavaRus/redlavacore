<?php

include_once __DIR__."/core/core.php";
include_once __DIR__."/core/event/manager.php";
$start = new Core\Event\Manager;
$start->start();
$ins = new \Core\Router\Router;
//$ins ->install();
//echo 1;

/**
 * install
 * $ins ->install();
 */


//$dd = new Core\Orm\Create();
//$Orm->select("id, name")->execute()->fetch();//

//INSERT INTO `category` SET `parent` = :parent, `name` = :name

//var_dump($Orm);

//$dd = $Orm->insert("name = name23, id = 323")->from("test")->execute();//->object();

/*$dd -> create("table_name1",9)//по умолчанию создает таблицу с id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
->add("name1","int","5","1","comment")
->add(null,"VARCHAR","255","null","comment")
->add("name3","VARCHAR","255","not null","comment")
->add("name4","text","","rddd","comment");
$dd ->execute();
/*

ghbvth

CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)

*/

//var_dump("<pre>",$dd,"</pre>");
//->execute()->fetch()->object();
 


?>