<?php
namespace Modules\Telecom\Controller;

use Core\Orm\Orm as Orm;

class MobilnayaSvyaz
{
    public function internet($url)
    {
        $tp = new \Modules\Telecom\Modules\Tarifs;
        $value = $tp->tarifs("mobile");
        $result = new \Core\Show\View;
        \Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/app.css">',"pre");
        echo
        \Core\Values\Val::returnHead("pre").
        \Core\Values\Val::returnHead(NULL).
        \Core\Values\Val::returnHead("post");
        $result->add("tarifs", $value);
        $header = new \Modules\Blocks\Modules\Header;
        $header->index(null);
        $banner = new \Modules\Blocks\Modules\Banners;
        $banner->index(null);
        $result->view("/modules/telecom/view/front/internet.php");
        $callMe = new \Modules\Blocks\Modules\CallMe;
        $callMe->index(null);
        $footer = new \Modules\Blocks\Modules\Footers;
        $footer->index(null);
    }
}