<?php 
    class ConnectionDB{
        private $host = "";
        private $user = "PNlFXONIR4";
        private $password = "1scucBD669";
        private $db = "PNlFXONIR4";
        public $conn;

        //Constructor class
        function __construct(){
            $this->conn = new mysqli($this->host, $this->user, $this->password,$this->db) or die(mysql_error());
            $this->conn->set_charset("utf8");
        }

        //Function that returns data with a sql query, it receives the columns to return, the table and the query
        public function getData($what, $where, $when){
            $result = $this->conn->query("SELECT $what FROM $where WHERE $when") or die($this->conn->error);
            if($result){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return false;
            }
        }
        //Function that returns if a data was added
        public function setData($fields, $table, $data){
            $result = $this->conn->query("INSERT INTO $table ($fields) VALUES ($data)")  or die($this->conn->error);
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function updateData($table, $what, $where){
            $result = $this->conn->query(" UPDATE $table SET $what WHERE $where ") or die($this->conn->error);
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>