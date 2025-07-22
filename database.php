<?php

class Database
{
    private $host = "localhost";
    private $db_name = "banking_system";
    private $username = "root";
    private $password = "";

    private $mysqli = "";
    private $result = array();
    private $conn = false;
    public function __construct()
    {
        if (!$this->conn) {
            $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            } else {
                return true;
            }
        }
    }

    public function insertData()
    {

    }

    public function updateData()
    {

    }

    public function deleteData()
    {

    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->mysqli->close();
            $this->conn = false;
        } else {
            return false;
        }
    }
}

?>