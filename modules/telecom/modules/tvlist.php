<?php
namespace Modules\Telecom\Modules;

use Core\Orm\Orm as Orm;

class TvList
{
    public function show($packet)
    {
        $orm = new Orm;
        $orm->select("name,	img")
        ->where("name_packet = $packet")
        ->from("telecom_tv")->execute()->object();

        return $orm;
    }
}