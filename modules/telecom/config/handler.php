<?php
namespace Modules\Telecom\Config;

class Handler
{
    
    public function index()
    {
        $value="index";
        $result = new \Core\Show\View;
        
        $result->add("name_param", $value);
        $result->view("/modules/index/view/front/index.php");
    }
    public function internet($url)
    {
        $page = new \Modules\Telecom\Controller\Internet;
        $page->internet($url);
    }
    public function InternetITv($url)
    {
        $page = new \Modules\Telecom\Controller\InternetITv;
        $page->internet($url);
    }
    public function mobilnayaSvyaz($url)
    {
        $page = new \Modules\Telecom\Controller\InternetITv;
        $page->internet($url);
    }
}