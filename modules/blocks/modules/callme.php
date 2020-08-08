<?php
namespace Modules\Blocks\Modules;

use Core\Orm\Orm as Orm;

class CallMe
{
    public function index($url)
    {
        $orm = new Orm;
        $bannerz = $orm->select("phome,text")
            ->where("
            id = 1
            "
            )->from("blocks_callme")->execute()->object();

echo '
<div class="coonect">
            <div class="coonect_in">'.$bannerz->object[0]["text"].'
                 '.$bannerz->object[0]["phome"].'
            </div>
        </div>
        ';
    }
}