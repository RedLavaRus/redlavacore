<?php
namespace Modules\Telecom\Modules;

use Core\Orm\Orm as Orm;

class Tarifs
{
    public function tarifs($type)
    {
 
        $orm = new Orm;
        $tarifs = $orm->select("id,name,opisanie,prises,dop_cods")
            ->where("
            type = $type
            "
            )->from("telecom_tarifs")->execute()->object();

            return $tarifs;

    }
}