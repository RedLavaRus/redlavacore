<?php

namespace Core\Admin;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
  /*
  Класс крон, отвечает за автозапуск приложений через крон
  */
class Menu
{
    public $element;

    public function install()
    {
        $dd = new Create();
        $dd -> create("admin_menu")
        ->add("name","VARCHAR","255","not null","Имя")
        ->add("url","VARCHAR","255","not null","Адрес")
        ->add("ru_name","VARCHAR","255","not null","Русское название")
        ->add("father","VARCHAR","255","null","Родитель");
        $dd ->execute();
    }
    public function showMenu($url)
    {
        $menu["lvl1"] = $this->menuLvl1($url);
        //$menu["lvl2"] = $this->menuLvl2($url);
        return $menu;



    }
    public function menuLvl1($url)
    {
        $father= 0;
        return $list = $this->listMenu(0);
    }
    public function menuLvl2($father)
    {
        return $list = $this->listMenu($father);
    }
  
    public function listMenu($father = null)
    {
        $orm = new Orm;
        $orm->select("name,url,ru_name")
        ->where("
        father = $father"
          )->from("admin_menu")->execute()->object();

          //var_dump("<pre>",$orm->object,"</pre>");
          return $orm->object;
    }
}


?>