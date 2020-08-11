<?php

namespace Core\Show;


/*
В обработчик поступает запись соответсвий 
url - модуль - класс - контролер
*/
class ViewAdmin
{
    public static $var;

    public function add($name,$values)
    {
        self::$var[$name] = $values;
    }
    public function viewAdmin($temp,$url)
    {
        $ttt = new \Core\Admin\Admin;
        $show["head"] = $ttt->showHead($url);
        $menu = new \Core\Admin\Menu;
        $show["menu"] = $menu->showMenu($url);
    
    
    
        
    echo
    \Core\Values\Val::returnHead("pre").
    \Core\Values\Val::returnHead(NULL).
    \Core\Values\Val::returnHead("post");
    
    echo "<body>";
    $result = new \Core\Show\View;  
    $result->add("menu",$show["menu"]);
    $result->view("/core/admin/view/menu.php");
    echo "<div class='a_main'>";
    $result = new \Core\Show\View;  
    $result->view("/core/admin/view/topnav.php");

    include_once $_SERVER['DOCUMENT_ROOT'].$temp;
    $result = new \Core\Show\View;  
    $result->view("/core/admin/view/botnav.php"); 
    echo "</div>";
    echo "</body>";

        $var = self::$var;
    }
    
}