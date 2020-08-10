<?php
$var = \Core\Show\View::$var;
//var_dump("<pre>",$var,"</pre>");

$mdde = new \Core\Admin\Menu;
foreach($var["menu"] as $menus)
{
    echo '<div class="a_menuLvl2 '.$menus.'">';
    $dd = $mdde -> menuLvl2(substr($menus,6));
    foreach($dd as $d){
        echo '<a href ="/admin/'.$d["url"].'/"><div class="a_element_menu">'.$d["ru_name"].'</div></a>';
    }
    echo '</div>';
}
?>