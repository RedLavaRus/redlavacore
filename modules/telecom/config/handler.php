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
    public function tv($url)
    {
        $page = new \Modules\Telecom\Controller\Tv;
        $page->internet($url);
    }
    public function InternetITv($url)
    {
        $page = new \Modules\Telecom\Controller\InternetITv;
        $page->internet($url);
    }
    public function mobilnayaSvyaz($url)
    {
        $page = new \Modules\Telecom\Controller\MobilnayaSvyaz;
        $page->internet($url);
    }
    public function connect($url)
    {
        $page = new \Modules\Telecom\Controller\Connect;
        $page->connect($url);
    }
    public function zayavka($url)
    {
        $page = new \Modules\Telecom\Controller\Zayavka;
        $page->Invite($url);
    }
    public function adminInternet($url)
    {
        $page = new \Modules\Telecom\Controller\Admin\Internet;
        $page->index($url);
    }
    public function ajaxShowTP($url)
    {
        $page = new \Modules\Telecom\Modules\Ajax\Internet;
        $page->index($url);
    }
    public function ajaxShowTV($url)
    {
        $page = new \Modules\Telecom\Modules\Ajax\Tv;
        $page->index($url);
    }
}