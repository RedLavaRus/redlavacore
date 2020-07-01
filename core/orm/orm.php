<?php

namespace Core\Orm;


use CFG;
use PDO;
/**/
class Orm
{
    public  $table_name;
    public  $fields;
    public  $type;
    public  $query;
    public  $where;
    public  $whereValue = null;
    public  $insert_value = null;
    public  $result;
    public  $queryValue = null;


    function __construct($table_name)
    {
        $this->_self_class = get_class($this);
        $this->from = " `".$table_name."` ";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO("mysql:host=".CFG::$db_host." ;dbname=".CFG::$db_name,CFG::$db_user,CFG::$db_pass,$opt);
        $this->pdo->exec("SET CHARSET ".CFG::$db_code);
    }


    /**
     * Принимает поля выборки, добавляет их в поля фиелдси в строкузапроса
     */
    public function select($field = "*")
    {

        $this->type = "select";
        $argument = explode(",", $field);//Принимает user или user,pssword,email
        if(!isset($argument["1"]))
        {
            if( $argument["0"] == "*")
            {
                $this->fields = "*";
                
            }else{
                $this->fields = "`".$argument[0]."`";
               
            }            
        }else{
            foreach($argument as $arg)
            {
                $result = trim($arg);
                $query[] ="`".$result."`";
            }
            $this->fields = implode(',',$query);
            
        } 
        return $this;
    }
    public function insert($field)
    {
        $this->type = "insert into";
        $this->field = explode(",", $field );
        return $this;
        
    }
    public function update($field)
    {
        $this->type = "update";
        $timed = explode(",",$field);
        foreach($timed as $tim){
          $res = explode("=", $tim);
          $total = $res["0"]." = ?";
          $this->field[]= $total["0"]." = ? ";
          $this->field_valie[] = $total["1"];
        }
    return $this;
    }
    public function delete()
    {
        $this->type = "delete from";
    }
    public function create()
    {
      $this->type = "create";
    
      
      
      return $this;
    }

    public function where($array)//id=1 | id=1 and name = name1 |  id=1 or name = name1 |
    {
        $total='';
        $argument = explode("=", $array);
        $x = 1;
        foreach($argument as $arg){            
            $arg = trim($arg);
            $res = explode(" ", $arg);
            if($x == 1){
                $x=0;
                $total = $total.$res[$x];
            }else{
                $res2 = str_replace($res[$x], "?", $arg);
                $total = $total." = ".$res2. " ";
                $this->whereValue[]= $res['0'];
            }
           
           
        }
        $this->where = $total;
        return $this;
    }
    public function values($value)
    {
      
        $this->insert_value = explode(",", $field );
        return $this;
    }


    public function execute()
    {
        if($this->type=="select"){
            $this->sql_query = $this->type." ". $this->fields . " from". $this->from;
            if($this->where != null){
                $this->sql_query=$this->sql_query." WHERE ".$this->where . " "; 
                $result = $this->pdo->prepare($this->sql_query);
            }else{

            }
            $this->result = $this->pdo->prepare($this->sql_query);
            $this->result->execute($this->whereValue);            
        }
        return $this;
    }
    public function fetch()
    {
        $this->array = $this->result->fetch(PDO::FETCH_ASSOC);
        return $this;
    }
}    








?>