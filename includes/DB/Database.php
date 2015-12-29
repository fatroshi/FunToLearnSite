<?php
class Database
{
    // Database
    private $servername     = "mysql17.citynetwork.se";
    private $username       = "101047-mv16378";
    private $password       = "funtolearn2015";
    private $dbname         = "101047-fun";
    private $connection     = null;

    function __construct() {
        $this->connect();
    }

    public function connect(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Hm... Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        $this->connection = $conn;
    }

    public function delete($id,$table){
        // sql to delete a record
        $sql = "DELETE FROM {$table} WHERE id={$id} ";

        if ($this->connection->query($sql) === TRUE) {
            echo "Record deleted successfully";
            return true;
        } else {
            echo "Error deleting record: " . $this->connection->error;
            return false;
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}

?>