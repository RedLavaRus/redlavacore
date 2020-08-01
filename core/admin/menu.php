<?php

namespace Core\Admin;

use Core\Orm\Orm as Orm;
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
        ->add("father","VARCHAR","255","not null","Родитель");
        $dd ->execute();
    }
    public function showMenu($url)
    {
        $menu["lvl1"] = $this->menuLvl1($url);
        $menu["lvl2"] = $this->menuLvl2($url);
        return $menu;



    }
    public function menuLvl1($url)
    {
        $list = $this->listMenu();
    }
    public function menuLvl2($url)
    {
        $list = $this->listMenu();
    }
  
    public function listMenu($father = null)
    {
        //$orm = new Orm;
        //$orm->select("id")
        //->where("
        //  login = $login, 
        //  password = $pass"
        //  )->from("users")->execute()->object();
    }
}


?>