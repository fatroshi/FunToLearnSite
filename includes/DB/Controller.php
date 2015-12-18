
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



}

?>