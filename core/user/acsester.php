<?php

namespace Core\User;

use \CFG;
use \Core\Values\Val as Val;
use Core\Orm\Orm as Orm;

/*
    класс обработки автоизации
    */
class Acsester
{
    /*
   Способ авторизации
    */
    public function permission($permission = null)
    {
        if($permission == null)return;
        if(!isset($_SESSION["id"])) \Core\Errors\E403::show();
        $perm_sql=null;
        $group_users = new Orm;
        $group_users->select("group_name")
        ->where("user_id = ".$_SESSION["id"])
        ->from("group_users")->limit(1)->execute()->object();

        if(isset($group_users->object[0]["group_name"]))$perm_sql = $group_users->object[0]["group_name"];
        
        $x=0;
        $grop_arr_id = explode(",",$perm_sql);
        foreach($grop_arr_id as $id_grp){
            $group_pex[$x] = new Orm;
            $group_pex[$x]->select("permission")
            ->where("name = $id_grp")
            ->from("group_permission")->execute()->object();
            $x++;
        }
        $fullpex = [];
        foreach($group_pex as $gr){
            $timed = explode(",",$gr->object[0]["permission"]);
            $fullpex= array_merge($fullpex,$timed);
        }
        foreach($fullpex as $pex_box)
        {
            if($pex_box == $permission)return;
        }
        \Core\Errors\E403::show();

    }
}