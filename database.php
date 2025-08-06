<?php

class Database
{
    private $host = "localhost";
    private $db_name = "anurag";
    private $username = "root";
    private $password = "";

    private $mysqli = "";
    private $result = array();
    private $conn = false;
    public function __construct()
    {
        if (!$this->conn) {
            $this->conn = true;
            $this->mysqli = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->mysqli->connect_error) {
                array_push($this->result, $this->mysqli->connect_error);
                return false;
            } else {
                return true;
            }
        }
    }

    public function insertData($table, $params = array())
    {
        if ($this->tableExists($table)) {
            // print_r($params);

            $tableColumns = implode(", ", array_keys($params));
            $tableValues = implode("', '", array_values($params));
            $sql = "INSERT INTO $table () VALUES ('$tableValues')";

            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }

    }

    public function updateData($table, $params = array(), $where = NULL)
    {
        if ($this->tableExists($table)) {
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value' ";
            }
            $sql = "UPDATE $table SET " . implode(',', $args);
            if ($where != null) {
                $sql .= "WHERE $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteData($table, $where = NULL)
    {
        if ($this->tableExists($table)) {
            $sql = "DELETE FROM $table";
            if ($where != NULL) {
                $sql .= " WHERE $where";
            }
            if ($this->mysqli->query($sql)) {
                array_push($this->result, $this->mysqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    public function select($table, $rows = "*", $join = null, $where = null, $order = null, $limit)
    {
        if ($this->tableExists($table)) {
            $sql = "SELECT $rows FROM $table";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                $sql .= " LIMIT 0,$limit";
            }
            echo $sql;
            $query = $this->mysqli->query($sql);
            if ($query) {
                $this->result = $query->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->mysqli->error);
                return false;
            }
        }
    }

    public function sql($sql)
    {
        $query = $this->mysqli->query($sql);
        if ($query) {
            $this->result = $query->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            array_push($this->result, $this->mysqli->error);
            return false;
        }

    }

    private function tableExists($table)
    {
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->mysqli->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            } else {
                array_push($this->result, $table . "Table does not exist");
                return false;
            }
        }
    }

    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
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