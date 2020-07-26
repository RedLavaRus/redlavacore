<?php

namespace Core\Orm;


use CFG;
use PDO;
use Core\Orm\Orm as Orm;

/*
    Класс для создание таблиц
    */
class Create extends Orm
{
   
    public $table_name;

    public $name;
    public $type_var;
    public $lang;
    public $default;
    public $comment;
    public $atribut;


/*
    Функция креат, отвечает за создание таблицы и уникального ид
    */
    public function create($table_name, $id_leng = 9)
    {
        $this->type = "create";
        $this->table_name = $table_name;
        $this->add("id", "INT", $id_leng, "NOT NULL", "Идентификатор"," AUTO_INCREMENT ");
        return $this;

    }
    /*
    Добавление столбца в базу данных
    */
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
    /*
   Создает рандомное имя
    */
    public function randName()
    {
        $temp = rand(1,999999);
        $temp = md5($temp);
        return $temp;
    }
    /*
    Обработчик имени
    */
    public function addName($name)
    {
        if($name != null){
            $this->name[] = $name;
        }else{
            $this->name[] = $this->randName();
        }
        return ;
    }
    /*
    Обработчик типа
    */
    public function addType($type)
    {
        if($type != null){
            $this->type_var[] = $type;
        } else{
            $this->type_var[] = "VARCHAR";
        } 
        return ;
    }
    /*
   Обработчик длины
    */
    public function addLang($lang)
    {
        if($lang != null){
            $this->lang[] = $lang; 
        }else{
            $this->lang[] = 255;
        }  
        return ;    
    }
    /*
    Обработчик стандартного значения
    */
    public function addDefault($default)
    {
        if($default != null){
            if($default == "fix"){
            $this->default[] = "";
            }else{
                $this->default[] = $default;
            }
        }else{
            $this->default[] = "NULL";
        }  
        return ;    
    }
    /*
    Обработчик коментария
    */
    public function addComment($comment)
    {
        if($comment != null){
            $this->comment[] = $comment; 
        }else{
            $this->comment[] ="";
        }  
        return ;    
    }
    /*
    Обработчик атрибутов
    */
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