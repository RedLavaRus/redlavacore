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

        $dd1 = new Create();
        $dd1 -> create("zayavka")
        ->add("tp","text","255","null","Тарифный план")
        ->add("adress","text","255","null","Адрес")
        ->add("fio","text","255","null","Ф.И.О")
        ->add("phone","VARCHAR","255","null","Телефон")
        ->add("namberz","VARCHAR","255","null","Номер заявки ")
        ->add("stat","VARCHAR","255","null","Статус");
        $dd1 ->execute();
    }
    public function delete()
    {
        
    }
}