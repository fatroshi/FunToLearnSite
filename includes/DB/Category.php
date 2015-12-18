<?php

include_once "includes/DB/Database.php";

class Category extends Database{

    private $connection;

    function __construct($connection) {

        $this->connection = $connection;
    }

    public function addCategory($categoryName){
        $sql = "INSERT INTO categories (categoryName)VALUES ('{$categoryName}')";

        if (mysqli_query($this->connection, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }

}


?>