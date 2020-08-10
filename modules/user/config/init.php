<?php
namespace Modules\User\Config;


use Core\Orm\Orm as Orm;
use Core\Orm\Create as Create;

class Init
{
    public function install()
    {
        


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
    }
    public function delete()
    {
        
    }
}