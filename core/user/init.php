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

        $group = new Create();
        $group -> create("group_permission")
        ->add("name","VARCHAR","255","not null","Название группы")
        ->add("permission","text","","not null","печерень привелегий, через запятую");
        $group ->execute();

        $group_users = new Create();
        $group_users -> create("group_users")
        ->add("user_id","VARCHAR","255","not null","ид пользователя")
        ->add("group_name","text","","not null","название групп, через запятую");
        $group_users ->execute();

        $orm = new Orm();
    }
    public function delete()
    {
        
    }
}