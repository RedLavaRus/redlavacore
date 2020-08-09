<?php
namespace Core\User;

use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Init
{
    public function install()
    {
        $user = new Create();
        $user -> create("user")
        ->add("login","VARCHAR","255","not null","Логин")
        ->add("pass","VARCHAR","255","not null","Пароль")
        ->add("email","VARCHAR","255","not null","Емаил")
        ->add("ip_reg","VARCHAR","255","not null","ип регистрации")
        ->add("ip_lust_auth","VARCHAR","255","not null","ип последнего входа")
        ->add("date_reg","VARCHAR","255","not null","Дата регистрации")
        ->add("date_lust_auth","VARCHAR","255","null","Дата последнего входа");
        $user ->execute();

        $orm = new Orm();
    }
    public function delete()
    {
        
    }
}