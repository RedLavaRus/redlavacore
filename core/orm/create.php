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
        $this->add("id", "INT", $id_leng, "", "Идентификатор","UNSIGNED AUTO_INCREMENT PRIMARY KEY");
        return $this;

    }
    public function add($name = null, $type = null, $lang = null , $default = null, $comment = null, $atribut = null)
    {
        $this->addName($name);
        $this->addType($type);
        $this->addLang($lang);
        $this->addDefault($default);
        $this->addComment($comment);
        $this->addAtribut($atribut); 
        return $this; 
    }
    public function randName()
    {
        $temp = rand(1,999999);
        $temp = md5($temp);
        return $temp;
    }
    public function addName($name)
    {
        if($name != null){
            $this->name[] = $name;
        }else{
            $this->name[] = $this->randName();
        }
        return ;
    }
    public function addType($type)
    {
        if($type != null){
            $this->type_var[] = $type;
        } else{
            $this->type_var[] = "VARCHAR";
        } 
        return ;
    }
    public function addLang($lang)
    {
        if($lang != null){
            $this->lang[] = $lang; 
        }else{
            $this->lang[] = 255;
        }  
        return ;    
    }
    public function addDefault($default)
    {
        if($default != null){
            $this->default[] = $default; 
        }else{
            $this->default[] = "NULL";
        }  
        return ;    
    }
    public function addComment($comment)
    {
        if($comment != null){
            $this->comment[] = $comment; 
        }else{
            $this->comment[] ="";
        }  
        return ;    
    }
    public function addAtribut($atribut)
    {
        if($atribut != null){
            $this->atribut[] = $atribut; 
        }else{
            $this->atribut[] = "";
        }  
        return ;    
    }

}    