<?php
namespace Modules\Telecom\Controller;

use Core\Orm\Orm as Orm;

class Connect
{
    public function connect($url)
    {
        $tp = new \Modules\Telecom\Modules\Tarifs;
        $value = $tp->tarifs("shpd");
        $tpinfo =  new \Modules\Telecom\Modules\Application;
        $app_info = $tpinfo->connect($url);
        $result = new \Core\Show\View;
        \Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/app.css">',"pre");
        echo
        \Core\Values\Val::returnHead("pre").
        \Core\Values\Val::returnHead(NULL).
        \Core\Values\Val::returnHead("post");
        $result->add("tarifs", $value);
        $result->add("tp_info", $app_info);
        $header = new \Modules\Blocks\Modules\Header;
        $header->index(null);
        $banner = new \Modules\Blocks\Modules\Banners;
        $banner->index(null);
        $result->view("/modules/telecom/view/front/connect.php");
        $callMe = new \Modules\Blocks\Modules\CallMe;
        $callMe->index(null);
        $footer = new \Modules\Blocks\Modules\Footers;
        $footer->index(null);
    }
}