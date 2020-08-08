<?php
namespace Modules\Main\Config;

class Init
{
    public function install()
    {
        $main = new Create();
        $main -> create("main")
        ->add("url_adres","VARCHAR","255","null","Цена")
        ->add("logo","VARCHAR","255","null","Цена")
        ->add("phone","VARCHAR","255","null","Цена")
        ->add("main_project","VARCHAR","255","null","Цена")
        ->add("main_pass","VARCHAR","255","null","Цена")
        ->add("main_smtp","VARCHAR","255","null","Цена")
        ->add("telegram_chat_id","VARCHAR","255","null","Цена")
        ->add("telegram_code","VARCHAR","255","null","Цена")

        ->add("dop_cods","VARCHAR","255","null","Дополниетльные сведения");
        $main ->execute();
    }
    public function delete()
    {
        
    }
}