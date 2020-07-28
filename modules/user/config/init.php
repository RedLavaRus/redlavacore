<?php
namespace Modules\User\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Init
{
    public function install()
    {
        $dd = new Create();
        $dd -> create("users")
        ->add("login","VARCHAR","255","not null","Логин")
        ->add("password","VARCHAR","255","not null","Пароль")
        ->add("email","VARCHAR","255","not null","Емаил")
        ->add("ip_reg","VARCHAR","255","not null","ип регистрации")
        ->add("date_reg","VARCHAR","255","not null","дата регистрации");
        $dd ->execute();
    }
    public function delete()
    {
        
    }
}