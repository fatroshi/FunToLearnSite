<?php

include_once "includes/App/Database.php";

class User extends Database {

    private $connection;

    function __construct() {
        $this->connection = parent::getConnection();
    }

    public function getUser(){

        if($this->connection != null){

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
    }
}

?>

