<?php

include_once("includes/DB/Database.php");

class User extends Database {

    private $connection;

    function __construct($connection) {
        $this->connection = $connection;
    }

    public function getUser(){

        $sql = "SELECT * FROM users";
        $result = $this->connection->query($sql) or die($this->connection->error);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    public function login($username, $password){

        $password = md5($password);
        $sql = "SELECT * FROM users WHERE username='{$username}' AND password='{$password}' LIMIT 1 ";
        $result = $this->connection->query($sql) or die($this->connection->error);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>

