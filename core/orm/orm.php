<?php

namespace Core\Orm;


use CFG;
use PDO;
/**/
class Orm
{
    public $type;
    public $field;
    public $table;
    public $where_array;
    public $set_array;
    public $insert_array;

    function __construct()
    {
        $this->_self_class = get_class($this);
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO("mysql:host=".CFG::$db_host." ;dbname=".CFG::$db_name,CFG::$db_user,CFG::$db_pass,$opt);
        $this->pdo->exec("SET CHARSET ".CFG::$db_code);
        return $this;
    }
    
    public function select($field)
    {
        $this->type = "select";        
        $this->field = $this->strToArray($field,",");
        return $this;
    }
    
    public function update($value)
    {
        $this->type = "update";  
        $res = $this->strToArray($value,",");
        foreach($res as $r){
            $this->set_array[] = $this->strToArray($r,"=");
        }
        return $this;
    }
    
    public function insert($value)
    {
        $this->type = "insert";  
        $res = $this->strToArray($value,",");
        foreach($res as $r){
            $this->insert_array[] = $this->strToArray($r,"=");
        }
        return $this;
    }
    
    public function delete()
    {
        $this->type = "delete"; 
        return $this;
    }
    
    public function create($field)
    {
        $this->type = "create"; 
        $this->field = $field;
        return $this;
    }
        
    public function from($table)//m = 1, n =2
    {
        $this->table = $table;
        return $this;
    }

    public function where($value)
    {
        $res = $this->strToArray($value,",");
        foreach($res as $r){
            $this->where_array[] = $this->strToArray($r,"=");
        }
        return $this;
    }
    


    public function strToArray($str,$char)
    {
        $rd = explode($char,$str);//m = 1, n =2
        if(empty($rd["1"]))
        {
            $total[] =  trim($rd["0"]);
        }else{
            foreach($rd as $r){
                $total[] =  trim($r);
            }
        }              
        return $total;
    }



    public function execute()
    {
        if($this->type == "select"){

            return $this;
        }
        if($this->type == "update"){

            return $this;
        }
        if($this->type == "insert"){

            return $this;
        }
        if($this->type == "delete"){

            return $this;
        }
        if($this->type == "create"){

            return $this;
        }
       /* if($this->type == "select"){
            $this->sql_query = $this->type." ". $this->fields . " from". $this->from;
            if($this->where != null){
                $this->sql_query=$this->sql_query." WHERE ".$this->where . " "; 
                $result = $this->pdo->prepare($this->sql_query);
            }else{

            }
            $this->result = $this->pdo->prepare($this->sql_query);
            $this->result->execute($this->whereValue);            
        }*/
        return $this;
    }
    public function fetch()
    {
        $this->array = $this->result->fetch(PDO::FETCH_ASSOC);
        return $this;
    }
    public function object()
    {
        
        return $this;
    }
}