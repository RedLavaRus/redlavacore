<?php
namespace Modules\Blocks\Modules;

use Core\Orm\Orm as Orm;

class Banners
{
    public function index($url)
    {
        $orm = new Orm;
        $bannerz = $orm->select("banner_adres,wxh")
            ->where("
            id = 1
            "
            )->from("blocks_banners")->execute()->object();
        $param = explode("_",$bannerz->object[0]["wxh"]);
        echo 
        '
        <div class="line3">
       <img src="'.$bannerz->object[0]["banner_adres"].'" width="'.$param[0].'px" height="'.$param[1].'px" style="margin: 0 calc((100% - '.$param[0].'px ) / 2 )">
   </div>
    
        ';
    }
}