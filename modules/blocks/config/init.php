<?php
namespace Modules\Blocks\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Init
{
    public function install()
    {
        $banners = new Create();
        $banners -> create("blocks_banners")
        ->add("banner_adres","VARCHAR","255","null","адрес баннера")
        ->add("wxh","VARCHAR","255","null","рахмер 300_100");
        $banners ->execute();

        $callme = new Create();
        $callme -> create("blocks_callme")
        ->add("phome","VARCHAR","255","null","телефон")
        ->add("text","VARCHAR","255","null","строка");
        $callme ->execute();

        $footer = new Create();
        $footer -> create("blocks_footer")
        ->add("father","VARCHAR","255","null","Hjlbntkm")
        ->add("name","VARCHAR","255","null","Название")
        ->add("url","VARCHAR","255","null","Адрес ссылки");
        $footer ->execute();

        $header = new Create();
        $header -> create("blocks_header")
        ->add("name","VARCHAR","255","null","Название")
        ->add("url","VARCHAR","255","null","Адрес ссылки");
        $header ->execute();
    }
    public function delete()
    {
        
    }
}