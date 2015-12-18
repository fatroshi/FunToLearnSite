<?php
class Database
{
    // Database
    private $servername     = "localhost";
    private $username       = "root";
    private $password       = "root";
    private $dbname         = "fun";
    private $connection     = null;

    function __construct() {
        $this->connect();
    }

    public function connect(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        $this->connection = $conn;
    }


    public function delete($id,$table){
        // sql to delete a record
        $sql = "DELETE FROM '{$table}' WHERE id={$id}";

        if ($this->connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $this->connection->error;
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}

?>