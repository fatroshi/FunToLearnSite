<?php

include_once "DB.php";

class Category extends Database{

    private $connection;

    function __construct() {
        $this->connection = parent::getConnection();
    }



}


?>