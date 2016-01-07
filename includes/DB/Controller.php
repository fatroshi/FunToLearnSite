<?php
include_once "includes/DB/Database.php";
include_once "includes/DB/User.php";
include_once "includes/DB/Category.php";

/**
 * Created by PhpStorm.
 * User: Farhad
 * Date: 18/12/15
 * Time: 17:46
 *
 * This class acts as the controller for the application.
 */

class Controller {

    private $database;
    private $user;
    private $category;

    function __construct() {
        $this->database = new Database();                                       // Connect to the database
        $this->user     = new User($this->database->getConnection());
        $this->category = new Category($this->database->getConnection());
    }

    /**
     * Get logged in user
     */
    public function getUser(){
        $this->user->getUser();
    }

    /**
     * Add category to the database
     * @param $categoryName
     * @return bool true if category was successfully added
     */
    public function addCategory($categoryName){
        return $this->category->addCategory($categoryName);
    }

    /**
     * Add item to the database
     * @param $img
     * @param $itemName
     * @param $categoryId
     */
    public function addItem($img,$itemName,$categoryId){
        $this->category->addItem($img,$itemName,$categoryId);
    }

    /**
     * Get item by item id
     * @param $id
     * @return mixed
     */
    public function getItem($id){
        return $this->category->getItem($id);
    }

    /**
     * Delete record by id
     * @param $id of the record
     * @param $table where the record is stored
     */
    public function delete($id, $table){
        $this->database->delete($id,$table);
    }

    /**
     * Redirect user to another page
     * @param $newURL
     */
    public function redirect($newURL){
        header("Location: " . $newURL);
        die();
    }

    /**
     * Get the last inserted record
     * @return mixed
     */
    public function insertId(){
        // Get last inserted id
        return $this->database->getConnection()->insert_id;
    }

    /**
     * Get all categories
     * @return array list of Categoery objects
     */
    public function allCategories(){
        return $this->category->allCategories();
    }

    /**
     * Get all items for the category
     * @param $categoryId
     * @return array list of Item objects
     */
    public function getCategoryItems($categoryId){
        return $this->category->allItems($categoryId);
    }

    /**
     * Get all items
     * @return array list of Item objects
     */
    public function getAllItems(){
        return $this->category->getAllItems();
    }

    /**
     * @return string json encoded
     */
    public function getAllItemsJSON(){
        return $this->category->getAllItemsJSON();
    }

    /**
     * Display data in an array
     * @param $array
     */
    public function var_dump($array){
        echo "<pre>";
        print_r($array); // or var_dump($data);
        echo "</pre>";
    }

    /**
     * Check if the user exists, and that the authentication returns true.
     * @param $username
     * @param $password
     * @return bool true if the user- password data is correct
     */
    public function login($username, $password){
        return $this->user->login($username,$password);
    }
}

?>