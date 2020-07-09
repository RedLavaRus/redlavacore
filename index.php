<?php

include_once __DIR__."/core/core.php";


use CFG;
use Core\Orm\Orm;

CFG::debag(true);

$Create = new Core\Orm\Create;
//$Orm->select("id, name")->execute()->fetch();//

//INSERT INTO `category` SET `parent` = :parent, `name` = :name

//var_dump($Orm);

//$dd = $Orm->insert("name = name23, id = 323")->from("test")->execute();//->object();
//$dd
$dd = Create("table_name","leng(9)");//по умолчанию создает таблицу с id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
$dd ->add("name1","type","leng","default","comment");
$dd ->add("name2","type","leng","default","comment");
$dd ->add("name3","type","leng","default","comment");
$dd ->add("name4","type","leng","default","comment");
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

var_dump("<pre>",$dd,"</pre>");
//->execute()->fetch()->object();
 


?>