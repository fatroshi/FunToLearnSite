<?php
include_once "includes/DB/Database.php";
include_once "includes/DB/User.php";
include_once "includes/DB/Category.php";

/**
 * Created by PhpStorm.
 * User: Farhad
 * Date: 18/12/15
 * Time: 17:46
 */

class Controller {

    private $database;
    private $user;
    private $category;

    function __construct() {
        $this->database = new Database();
        $this->user     = new User($this->database->getConnection());
        $this->category = new Category($this->database->getConnection());
    }


    public function getUser(){
        $this->user->getUser();
    }

    public function addCategory($categoryName){
        $this->category->addCategory($categoryName);
    }

    public function addItem($img,$itemName,$categoryId){
        $this->category->addItem($img,$itemName,$categoryId);
    }

    public function getItem($id){
        return $this->category->getItem($id);
    }

    public function delete($id, $table){
        $this->database->delete($id,$table);
    }

    public function redirect($newURL){
        header("Location: " . $newURL);
        die();
    }

    public function insertId(){
        // Get last inserted id
        return $this->database->getConnection()->insert_id;
    }

    public function allCategories(){
        return $this->category->allCategories();
    }

    public function getCategoryItems($categoryId){
        return $this->category->allItems($categoryId);
    }

    public function getAllItems(){
        return $this->category->getAllItems();
    }
}

?>