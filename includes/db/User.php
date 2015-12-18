<?php

include_once("includes/db/Database.php");

class User extends Database {

    public function getUser(){
        $conn = parent::getConnection();
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql) or die($conn->error);

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

?>

