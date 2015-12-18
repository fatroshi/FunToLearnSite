<?php
include_once "includes/DB/Database.php";
class Category extends Database{

    private $connection;

    function __construct($connection) {

        $this->connection = $connection;
    }

    public function addCategory($categoryName){

        if(!$this->categoryExists($categoryName)){

            $sql = "INSERT INTO categories (categoryName)VALUES ('{$categoryName}')";
            if (mysqli_query($this->connection, $sql)) {
                echo "New record created successfully";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
                return false;
            }
        }
    }

    public function categoryExists($categoryName){
        $sql = "SELECT * FROM categories WHERE categoryName='{$categoryName}'";
        $result = $this->connection->query($sql) or die($this->connection->error);

        if ($result->num_rows > 0) {
            return true;
        } else {
           return false;
        }

    }

    public function all(){
        $categories = array();
        $sql = "SELECT * FROM categories";
        $result = $this->connection->query($sql) or die($this->connection->error);
        while($row = $result->fetch_assoc()) {
            $categories[$row["id"]] = $row["categoryName"];

        }
        return $categories;
    }

    public function addItem($img,$itemName,$categoryId){
        $sql = "INSERT INTO items (imgName,itemName,categoryId) VALUES ('{$img}','{$itemName}','{$categoryId}')";
        if (mysqli_query($this->connection, $sql)) {
            echo "New record created successfully";
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
            return false;
        }
    }

}


?>