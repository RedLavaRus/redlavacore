<?php
namespace Modules\Telecom\Controller;

use Core\Orm\Orm as Orm;

class Zayavka
{
    public function invite($url)
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
        $result->add("url", $url);
        $result->view("/modules/index/view/bloks/headbar.php");
        $result->view("/modules/index/view/bloks/blockimg.php");
        $result->view("/modules/telecom/view/front/zayavka.php");
        $result->view("/modules/index/view/bloks/footer.php");
    }
}