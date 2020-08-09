<?php
namespace Modules\Test\Config;

class Handler
{
    
    public function index()
    {
        $ld = new \Core\User\View\login;
        $ld->showForm();
    }
}