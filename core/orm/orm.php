<?php

namespace Core\Orm;


use CFG;
use PDO;
class Orm
{
    public $type;
    public $field;
    public $table;
    public $where_array;
    public $set_array;
    public $insert_array;
    public $query;
    public $query_value;
    public $pdo;
    public $execute;
    public $array;
    public $atribut;
/*
    Инициация орм объекта
    */
    public function __construct()
    {
        $this->_self_class = get_class($this);
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO("mysql:host=".CFG::$db_host.":3306 ;dbname=".CFG::$db_name, CFG::$db_user, CFG::$db_pass, $opt);
        $this->pdo->exec("SET CHARSET ".CFG::$db_code);
        return $this;
    }
    /*
    Выборка из бд
    */
    public function select($field)
    {
        $this->type = "select";
        $this->field = $this->strToArray($field, ",");
        return $this;
    }
    /*
    Обновление бд
    */
    public function update($value)
    {
        $this->type = "update";
        $res = $this->strToArray($value, ",");
        foreach ($res as $r) {
            $this->set_array[] = $this->strToArray($r, "=");
        }
        return $this;
    }
    /*
    Вставка в бд*/
    public function insert($value)
    {
        $this->type = "insert";
        $res = $this->strToArray($value, ",");
        foreach ($res as $r) {
            $this->insert_array[] = $this->strToArray($r, "=");
        }
        return $this;
    }
    /*
    Удаление из бд
    */
    public function delete()
    {
        $this->type = "delete";
        return $this;
    }
/*
    Обработчик условия фром
    */
    public function from($table)//m = 1, n =2
    {
        $this->table = $table;
        return $this;
    }
/*
    Обработчик условия вхере
    */
    public function where($value)
    {
        $res = $this->strToArray($value, ",");
        foreach ($res as $r) {
            $this->where_array[] = $this->strToArray($r, "=");
        }
        return $this;
    }
    

/*
    Приведение строки к массиву
    */
    public function strToArray($str, $char)
    {
        $rd = explode($char, $str);//m = 1, n =2
        if (empty($rd["1"])) {
            $total[] =  trim($rd["0"]);
        } else {
            foreach ($rd as $r) {
                $total[] =  trim($r);
            }
        }
        return $total;
    }


/*
    Выполнение запроса
    */
    public function execute()
    {
        if ($this->type == "select") {
            $this->query = "SELECT ";

            $s=0;
            $timed = "";
            foreach ($this->field as $field) {
                if ($s >= 1) {
                    $timed = " , ";
                }
                $this->query .=  $timed." `".trim($field)."` ";
                $s++;
            }
            $this->query .= " FROM `".$this->table . "` ";
            $s=0;
            $timed = "";
            if (!empty($this->where_array)) {
                $this->query .= " WHERE ";
                foreach ($this->where_array as $wh) {
                    if ($s >= 1) {
                        $timed = " AND ";
                    }
                    $this->query .= $timed." `".$wh["0"]."` = ?";
                    $this->query_value[] = $wh["1"];
                    $s++;
                }
            }
            if($this->atribut != null) $this->query .= " ".$this->atribut." ";
                $this->execute = $this->pdo->prepare($this->query);
                $this->execute->execute($this->query_value);
            return $this;

        }
        if ($this->type == "update") {
            $this->query = "UPDATE "." `".$this->table."` "." SET ";

            $s=0;
            $timed = "";
            foreach ($this->set_array as $wh) {
                if ($s >= 1) {
                    $timed = " , ";
                }
                $this->query .= $timed." `".$wh["0"]."` = ?";
                $this->query_value[] = $wh["1"];
                $s++;
            }
            $s=0;
            $timed = "";
            if (!empty($this->where_array)) {
                $this->query .= " WHERE ";
                foreach ($this->where_array as $wh) {
                    if ($s >= 1) {
                        $timed = " AND ";
                    }
                    $this->query .= $timed." `".$wh["0"]."` = ?";
                    $this->query_value[] = $wh["1"];
                    $s++;
                }
            }
            if($this->atribut != null) $this->query .= " ".$this->atribut." ";
            $this->execute = $this->pdo->prepare($this->query);
            $this->execute->execute($this->query_value);
            return $this;
        }
        if ($this->type == "insert") {
            $this->query = "INSERT INTO "." `".$this->table."` ";
            $s=0;
            $timed = "";
            $left = " ( ";
            $right = " ( ";
            foreach ($this->insert_array as $wh) {
                if ($s >= 1) {
                    $timed = ",";
                }
                $left .= $timed." `".$wh["0"]."`  ";
                $right .= $timed." ? ";
                $this->query_value[] =$wh["1"];
                $s++;
            }

            $left .= " ) ";
            $right .= " ) ";
            $this->query .=$left." VALUES ".$right;
            $this->execute = $this->pdo->prepare($this->query);
            $this->execute->execute($this->query_value);
            return $this;
        }
        if ($this->type == "delete") {
            return $this;
        }
        if ($this->type == "create") {
            $this->query = " CREATE TABLE `".$this->table_name."` ( ";
                $x=0;
            do{
                $x != 0 ? $this->query .= " , " : $this->query .="";
                $this->query .= " `".$this->name[$x]."` ";
                $this->query .= " ". $this->type_var[$x];
                $this->query .= " (".$this->lang[$x].")";
                if ($this->default[$x] != null) {
                   // $this->query .= "  DEFAULT ".$this->default[$x];
                }
                if ($this->comment[$x] != null) {
                    $this->query .= " COMMENT ' ".$this->comment[$x]." ' ";
                }
                if ($this->atribut[$x] != null) {
                    $this->query .= $this->atribut[$x];
                }
                $x++;
            }while($this->name[$x]);
            $this->query .= " , PRIMARY KEY (`id`)) ENGINE = InnoDB";
            echo $this->query;

            $this->execute = $this->pdo->prepare($this->query);
            $this->execute->execute();
            return $this;
        }
        return $this;
    }
    /*
    Выполнение фетч
    */
    public function limit($start = null, $limit = null)//LIMIT число, число
    {
        if($limit != null)
        {
            $branch = $start." , ".$limit;
        }else{
            $branch = $start;
        }
        $this->atribut .= "LIMIT ".$branch." ";
        return $this;
    }
    public function order($name)
    {
        $this->atribut .= " ORDER BY `".$name."` ";
        return $this;
    }
    public function desc()
    {
        $this->atribut .=" DESC ";
        return $this;
    }
    public function fetch()
    {
        $this->array = $this->execute->fetch(PDO::FETCH_ASSOC);
        return $this;
    }
    /*
   Приведение результата к объекту
    */
    public function object()
    {
        do{
            $this->fetch();
            $this->object[] = $this->array;
        }
        while($this->array);
        array_pop($this->object) ;
        return $this;
    }
}