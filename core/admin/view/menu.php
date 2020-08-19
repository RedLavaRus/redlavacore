<?php

$var = \Core\Show\View::$var;
//var_dump("<pre>",$var["menu"]["lvl1"],"/<pre>");
?>
<div class="a_menuLvl1">
    <div class="a_head_menu">
        Меню
    </div>
    <?php
$arr_m = [];
    foreach($var["menu"]["lvl1"] as $m){
        echo 
        '<div class="a a_element_menu " id="menu1_'.$m["url"].'">'.$m["ru_name"].'</div>';
        $arr_m[] ="menu1_".$m['url'];
    }

    $result = new \Core\Show\View; 
    $result->add("menu",$arr_m);
?>








</div>

