<?php
namespace Modules\Telecom\Modules;

use Core\Orm\Orm as Orm;

class Application
{
    public function connect($url)
    {
        if(!isset($url["get"]["tp"]))
        {
            $tp_nam = $url["post"]["tp"];
        }else{
            $tp_nam = $url["get"]["tp"];

        }

        $orm = new Orm;
        $tarifs = $orm->select("id,name,opisanie,prises,dop_cods")
            ->where("
            id = $tp_nam
            "
            )->from("telecom_tarifs")->execute()->object();


        return $tarifs->object;

    }
}