<?php

namespace Core\Orm;


use CFG;
use PDO;
use Core\Orm\Orm as Orm;


class Create extends Orm
{
   
    public $table_name;

    public $name;
    public $type_var;
    public $lang;
    public $default;
    public $comment;
    public $atribut;



    public function create($table_name, $id_leng = 9)
    {
        $this->type = "create";
        $this->table_name = $table_name;

        $this->name[] = "id";
        $this->type_var[] = "INT";
        $this->lang[] = $id_leng;
        $this->default[] = "";
        $this->comment[] ="Идентификатор";
        $this->atribut[] ="UNSIGNED AUTO_INCREMENT PRIMARY KEY";
        return $this;

    }
    public function add($name = null, $type = null, $lang = null , $default = null, $comment = null, $atribut = null)
    {
        $name != null ?     $this->name[] = $name           : $this->name[] = $this->randName();
        $type != null ?     $this->type_var[] = $type      : $this->type_var[] = "VARCHAR";
        $lang != null ?     $this->lang[] = $lang          : $this->lang[] = 255;
        $default != null ?  $this->default[] = $default    : $this->default[] = "NULL";
        $comment != null ?  $this->comment[] = $comment    : $this->comment[] = "";
        $atribut != null ?  $this->tribut[] = $atribut     : $this->atribut[] = "";  
        return $this; 
    }
    public function randName()
    {
        $temp = rand(1,999999);
        $temp = md5($temp);
        return $temp;
    }

}    