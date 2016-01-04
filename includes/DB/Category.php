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

    public function allCategories(){
        $categories = array();
        $sql = "SELECT * FROM categories";
        $result = $this->connection->query($sql) or die($this->connection->error);
        while($row = $result->fetch_assoc()) {
            $categories[$row["id"]] = $row["categoryName"];

        }
        return $categories;
    }

    public function allItems($categoryId){
        $items = array();
        $sql = "SELECT * FROM items WHERE categoryId={$categoryId}";
        $result = $this->connection->query($sql) or die($this->connection->error);
        while($row = $result->fetch_assoc()) {
            $items[]= array ($row["id"],$row['imgName'],$row['itemName'],$categoryId);

        }
        return $items;
    }

    public function addItem($img,$itemName,$categoryId){
        if(!$this->itemExists($itemName)){

            $sql = "INSERT INTO items (imgName,itemName,categoryId,published) VALUES ('{$img}','{$itemName}','{$categoryId}', CURRENT_TIMESTAMP )";
            if (mysqli_query($this->connection, $sql)) {
                echo "<span class='text-success'>New record created successfully</span>";
                return true;
            } else {
                echo "<span class='text-danger>" . "<hr> Error: " . $sql . "<br>" . mysqli_error($this->connection) . "</span>";
                return false;
            }
        }
    }

    public function getItem($id){
        $sql = "SELECT * FROM items WHERE id={$id}";
        $result = $this->connection->query($sql) or die($this->connection->error);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function itemExists($itemName){
        $sql = "SELECT * FROM items WHERE itemName='{$itemName}'";
        $result = $this->connection->query($sql) or die($this->connection->error);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function getAllItems(){
        $items = array();
        $sql = "SELECT * FROM categories";
        $result = $this->connection->query($sql) or die($this->connection->error);
        while($row = $result->fetch_assoc()) {

            $sql = "SELECT * FROM items WHERE categoryId={$row['id']}";
            $itemResult = $this->connection->query($sql) or die($this->connection->error);
            while($item = $itemResult->fetch_assoc()) {
                $items[] = array($row['id'],$row['categoryName'],$item['imgName'],$item['itemName']);
            }

        }
        return $items;
    }

    public function getAllItemsJSON(){

        $sql = "SELECT * FROM categories";
        $result = $this->connection->query($sql) or die($this->connection->error);
        $items = array();
        while($row = $result->fetch_assoc()) {

            $sql = "SELECT * FROM items WHERE categoryId={$row['id']}";
            $itemResult = $this->connection->query($sql) or die($this->connection->error);
            while($item = $itemResult->fetch_assoc()) {
                $ar = array(
                            "categoryId" => $row['id'], "itemId" => $item['id'], "categoryName" => $row['categoryName'],
                            "imgName" => $item['imgName'],"itemName" => $item['itemName'], "uploadFolder" => "uploads",
                            "published" => $item['published']
                            );
                array_push($items,$ar);
            }

        }
        return json_encode($items);
    }

}


?>