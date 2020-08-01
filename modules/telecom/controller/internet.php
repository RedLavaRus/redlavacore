<?php
namespace Modules\Telecom\Controller;

use Core\Orm\Orm as Orm;

class Internet
{
    public function internet($url)
    {
        $tp = new \Modules\Telecom\Modules\Tarifs;
        $value = $tp->tarifs("shpd");
        $result = new \Core\Show\View;
        \Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/app.css">',"pre");
        echo
        \Core\Values\Val::returnHead("pre").
        \Core\Values\Val::returnHead(NULL).
        \Core\Values\Val::returnHead("post");
        $result->add("tarifs", $value);
        $result->view("/modules/index/view/bloks/headbar.php");
        $result->view("/modules/index/view/bloks/blockimg.php");
        $result->view("/modules/telecom/view/front/internet.php");
        $result->view("/modules/index/view/bloks/footer.php");
    }
}