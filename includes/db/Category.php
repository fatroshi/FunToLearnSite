<?php

include_once "includes/db/Category.php";

class Category extends Database{

    private $connection;

    function __construct() {
        $this->connection = parent::getConnection();
    }



}


?>