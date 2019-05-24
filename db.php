<?php
class DataBase{
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = 'password';
    protected $dbname = 'tracking';
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: ". $this->conn->connect_error);
        }
    }
    
    public function select($query)
    {
        $records = [];
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    public function insert($query)
    {
        if ($this->conn->multi_query($query) === TRUE) {
            return true;
        }
        return false;
    }

    public function singleInsert($query)
    {
        if ($this->conn->query($query) === TRUE) {
            return true;
        }
        return false;
    }

    public function delete($query)
    {
        if ($this->conn->multi_query($query) === TRUE) {
            return true;
        }
        return false;
    }

    public function singleDelete($query)
    {
        if ($this->conn->query($query) === TRUE) {
            return true;
        }
        return false;
    }

    public function update($query)
    {
        if ($this->conn->query($query) === TRUE) {
            return true;
        }
        return false;
    }

}



?>