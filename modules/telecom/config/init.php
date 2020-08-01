<?php
namespace Modules\Telecom\Config;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;
class Init
{

    public function install()
    {
        $dd = new Create();
        $dd -> create("telecom_tarifs")
        ->add("type","VARCHAR","255","not null","тип:Мобильная свзяь, шпд, тв, оборудование")
        ->add("name","VARCHAR","255","not null","Название")
        ->add("opisanie","text","255","not null","Параметр")
        ->add("prises","VARCHAR","255","not null","Цена")
        ->add("dop_cods","VARCHAR","255","null","Дополниетльные сведения");
        $dd ->execute();
    }
    public function delete()
    {
        
    }
}