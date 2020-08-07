<?php
namespace Modules\Telecom\Modules;

use Core\Orm\Orm as Orm;

class Zayavka
{

    
    public function addClient($var,$tp_in)
    {
        $tp = $tp_in;
        $adress = 'Улица: '.$var['url']["post"]["s1"].
        ' Дом: '.$var['url']["post"]["s2"].
        ' Квартира: '.$var['url']["post"]["s3"] ;
        $fio = '
        Фамилия: '.$var['url']["post"]["s5"].' Имя: '.$var['url']["post"]["s4"];
        $phone = $var['url']["post"]["s6"];
        $orm = new Orm;
        $orm->insert("tp = $tp,adress = $adress, fio = $fio, phone = $phone, stat = new")            
            ->from("zayavka")->execute();


    }
}