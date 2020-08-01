<?php

namespace Core\Admin;


use \Core\Values\Val as Val;
use \Core\Admin\Menu as Menu;
  /*
  Класс крон, отвечает за автозапуск приложений через крон
  */
class Admin
{
  public function index($url)
  {
    $show["head"] = $this->showHead($url);
    $menu = new Menu;
    $show["menu"] = $menu->showMenu($url);



    $this->show($show);
  }

  public function showHead($url)
  {

    $head =  
    \Core\Values\Val::returnHead("pre").
    \Core\Values\Val::returnHead(NULL).
    \Core\Values\Val::returnHead("post");
    return $head;
  }


  public function show($url)
  {

    echo
    \Core\Values\Val::returnHead("pre").
    \Core\Values\Val::returnHead(NULL).
    \Core\Values\Val::returnHead("post");
    
    echo "<body>";
    $result = new \Core\Show\View;  
    $result->view("/core/admin/view/menu.php");
    echo "<div class='a_main'>";
    $result = new \Core\Show\View;  
    $result->view("/core/admin/view/topnav.php");
    $result = new \Core\Show\View;  
    $result->view("/core/admin/view/botnav.php"); 
    echo "</div>";
    echo "</body>";
  }
  

}


?>