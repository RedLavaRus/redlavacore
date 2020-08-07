<?php

$result = new \Core\Show\View;
\Core\Values\Val::addHead('<link rel="stylesheet" href="/res/css/app.css">',"pre");

        echo
        \Core\Values\Val::returnHead("pre").
        \Core\Values\Val::returnHead(NULL).
        \Core\Values\Val::returnHead("post");

$header = new \Modules\Blocks\Modules\Header;
$header->index(null);
$banner = new \Modules\Blocks\Modules\Banners;
$banner->index(null);
//$telecom = new \Modules\Telecom\Modules\Blocks\TarifsIndex;
//$telecom->index(null);
//$telecom = new \Modules\News\Modules\Blocks\MiniB;
//$telecom->index(null);
$callMe = new \Modules\Blocks\Modules\CallMe;
$callMe->index(null);
$footer = new \Modules\Blocks\Modules\Footers;
$footer->index(null);

?>