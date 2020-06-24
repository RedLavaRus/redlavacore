<?php

namespace Core\Orm;

include_once __DIR__."/config.php";

use CFG;
use PDO;
/**/
Class Orm
{
	public $pdo;
	public static $instance;
	private $prodaction;
	private $type;
	private $sql_query;
    private $values_for_exec;
    public $status = null;

    
   
    function __construct($prodaction = false,$array_option = array()){        
        $this->sql_query = "";
        $this->values_for_exec = array();
        $this->prodaction = $prodaction;
        $opt = $this->set_option($this->prodaction);
		$this->pdo = new PDO("mysql:host=".CFG::$db_host." ;dbname=".CFG::$db_name,CFG::$db_user,CFG::$db_pass,$opt);		
		$this->pdo->exec("SET CHARSET ".CFG::$db_code);	
    }

    
    public static function Instance($prodaction = false,$array_option = array()){
        if(self::$instance == NULL){
            self::$instance = new Orm($prodaction);
        }
        return self::$instance;
    }


    public function Create($table){
        $this->sql_query = "CREATE TABLE `". CFG::$db_name."`.`$table` ( `id` INT(9) NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        $this->type = 'create';
        return $this;
    }


    public function AddColumn($table, $colum_name="default", $colum_type = "VARCHAR" , $colum_length="250"){
        $this->sql_query = "ALTER TABLE `$table` ADD  `$colum_name` $colum_type ($colum_length) NOT NULL AFTER id;";
        $this->type = 'AddColumn';
        return $this;
    }


    public function Select($table){
        $this->sql_query = "SELECT * FROM `$table` ";
        $this->type = 'select';
        return $this;
    }


    public function Insert($table){
        $this->sql_query = "INSERT INTO `$table` ";
        $this->type = 'insert';
        return $this;
    }


    public function Update($table){
        $this->sql_query = "UPDATE `$table` ";
        $this->type = 'update';
        return $this;
    }


    public function Delete($table){
        $this->sql_query = "DELETE FROM `$table`";
        $this->type = 'delete';
        return $this;
    }
 
    public function order_by($val, $type){
        $this->sql_query .= " ORDER BY `$val` $type ";
        return $this;
    }

    public function where($where, $op = '='){
        $vals = array();
        foreach($where as $k => $v){
            $vals[] = "`$k` $op :$k";
            $this->values_for_exec[":".$k] = $v;
        }
        $str = implode(' AND ',$vals);
        $this->sql_query .= " WHERE " . $str .' ';
        return $this;
    }

 
    public function limit($from, $count = NULL){
        $res_str = "";
        if($count == NULL){
            $res_str = $from;
        }else{
            $res_str = $from . "," . $count;
        }
        $this->sql_query .= " LIMIT " . $res_str;
        return $this;
    }

    public function values($arr_val){
        $cols = array();
        $masks = array();
        $val_for_update = array();

        foreach($arr_val as $k => $v){
            $value_mask = explode(' ',$v);
            $value_mask = $value_mask[0];
            $value_key = explode(' ', $k);
            $value_key = $value_key[0];
            $cols[] = "`$value_key`";
            $masks[] = ':'.$value_key;

            $val_for_update[] = "`$value_key`=:$value_key";
            $this->values_for_exec[":$value_key"] = $v;
        }
        if($this->type == "insert"){
            $cols_all = implode(',',$cols);
            $masks_all = implode(',',$masks);
            $this->sql_query .= "($cols_all) VALUES ($masks_all)";
        }else if($this->type == 'update'){
            $this->sql_query .= "SET ";
            $this->sql_query .= implode(',',$val_for_update);
        }
        
        return $this;
    }

    public function execute(){
        
        $q = $this->pdo->prepare($this->sql_query);
        $this->status = "OK";
        try{
        $q->execute($this->values_for_exec);
        } finally {
            $this->status = "ERROR";
            
        }
        
        if($q->errorCode() != PDO::ERR_NONE){
            $info = $q->errorInfo();
            $this->status = "ERROR";
            die($info[2]);
        }
        if($this->type == "select"){
            $this->set_default();
            $this->status = "OK";
            return $q->fetchall();
        }else if($this->type == 'insert'){
            $this->set_default();
            $this->status = "OK";
            return $this->pdo->lastInsertId();
        }else{
            $this->set_default();
            $this->status = "OK";
            return true;	
        }    
    }


    public function get_pdo(){
        return $this->pdo;
    }

 
    private function set_default(){
        $this->type = "";
        $this->sql_query = "";
        $this->values_for_exec = array();
        $this->status = "OK";
    }

    private function set_option($prodation,$array = array()){
        $opt = array();
        if(!$this->prodaction){
            if($array){
                $opt = $array;
            }else{
                $opt[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $opt[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
            }
        }else{
            if($array){
                $opt = $array;
            }else{
                $opt[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
            }
        }
        return $opt;
    }

}


?>