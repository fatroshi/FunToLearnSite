<?php include_once("includes/DB/Controller.php") ?>

<?php
    $controller = new Controller();

    $items = $controller->getAllItems();

    foreach($items as $item){
        $id         =  $item[0];
        $img        =  $item[1];
        $name       =  $item[2];
        $categoryId = $item[3];

        echo "CategoryId " . $categoryId . "<BR>";
        echo "Id " . $id  . "<BR>";
        echo "name " . $name  . "<BR>";
        echo "Image " . $img  . "<BR>";
        echo "<hr>";

    }

?>
