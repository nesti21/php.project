<?php
namespace database;
//MY
include ('config.php');




class DB {

    private $mysqli;

    public function __construct() {
        $this->mysqli = new \mysqli(
                MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB, MYSQL_PORT);
        if ($this->mysqli->errno) {
            echo "Not connect to MySQL: " . $this->mysqli->connect_error
            . ' (' . $this->mysqli->errno . ')';
        } else {
            $this->mysqli->set_charset("utf8");
        }
    }

    public function getData($param = []) {
        $query = '';
        //query("SELECT id, label FROM test WHERE id = 1");
        if (isset($param['select']) && $param['select']) {
            //ok
        } else {
            $param['select'] = '*';
        }

        if (isset($param['table']) && $param['table']) {
            //ok
        } else {
            die('Not set table');
        }
        
        if(isset($param['table2']) && $param['table2']){
            
        } else {
            $param['table2'] = '';
        }

        if (isset($param['where']) && $param['where']) {
            //ok
        } else {
            $param['where'] = '';
        }

        if (isset($param['order']) && $param['order']) {
            //ok
        } else {
            $param['order'] = '';
        }

        if (isset($param['limit']) && $param['limit']) {
            //ok
        } else {
            $param['limit'] = '';
        }

        $query = "SELECT " . $param['select'] . " FROM " . $param['table'];
        if($param['table2']){
            
            $query .= " JOIN " . $param['table2'];
            $query .= " on " . $param['constraint'];
        }
        
        if ($param['where']) {
            $query .= " WHERE " . $param['where'];
        }
        if ($param['order']) {
            $query .= " ORDER BY " . $param['order'];
        }
        if ($param['limit']) {
            $query .= " LIMIT " . $param['limit'];
        }
        

        $result = NULL;

        $sql = $this->mysqli->query($query);
        if (!$this->mysqli->errno) {
            $result = $sql->fetch_all(MYSQLI_ASSOC);
        } else {
            die($this->mysqli->error . ' :: ' . $query);
        }
        return $result;
    }
    
    
    public function InsertData ($param=[]){
         $query = '';
         
        
         if (isset($param['table']) && $param['table']) {
            //ok
        } else {
           die('Not set table');
        }
        if (isset($param['params']) && $param['params']) {
            //ok
        } else {
           die('Not set params');
        }
        if (isset($param['values']) && $param['values']) {
            //ok
        } else {
           die('Not set values');
        }

        $query = "INSERT INTO " . $param['table'] . "(".$param['params'].")". "values"."(".$param['values'].")";
        
        

        $sql = $this->mysqli->query($query);
        
      }
      
      public function deleteData($table, $key, $id) {
        $id = intval($id);
        if ($id > 0) {
            if ($table && $key) {
              $query = "DELETE FROM " . $table . " WHERE " . $key . "=" . $id;
              $sql = $this->mysqli->query($query);
              if (!$this->mysqli->errno) {
                  $result = $this->mysqli->affected_rows;
              } else {
                  die($this->mysqli->errno . ' :: ' . $query);
              }
            } else {
                die('Table or Key is empty string');
            }
        } else {
            die('ID < 0');
        }
        return $result;
    }
         
    }
  
