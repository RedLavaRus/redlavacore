<?php
namespace Modules\Telecom\Modules\ORM;

use Core\Orm\Orm as Orm;

class Zayavka
{
    public function install()
    {
        $dd = new Create();
        $dd -> create("zayavka")
        ->add("tp","text","255","null","Тарифный план")
        ->add("adress","text","255","null","Адрес")
        ->add("fio","text","255","null","Ф.И.О")
        ->add("phone","VARCHAR","255","null","Телефон")
        ->add("namberz","VARCHAR","255","null","Номер заявки ")
        ->add("stat","VARCHAR","255","null","Статус");
        $dd ->execute();
    }
    
    public function addClient($url)
    {

    }
}