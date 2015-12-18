<?php

include_once "includes/App/Database.php";

class Category extends Database{

    private $connection;

    function __construct() {
        $this->connection = parent::getConnection();
    }



}


?>