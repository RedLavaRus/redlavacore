<?php
namespace Modules\Telecom\Controller\Admin;

use Core\Orm\Orm as Orm;

class Internet
{
    public function index($url)
    {
        $adres = "/modules/telecom/view/admin/internet.php";
        $view = new \Core\Show\ViewAdmin;
        $view->viewAdmin($adres,$url);
    }
}