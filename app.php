<?php include_once("includes/DB/Controller.php") ?>

    <item time="2015-11-06">

    <?php
    $controller = new Controller();
    $items = $controller->getAllItems();
    //$controller->var_dump($items);

    foreach($items as $item){
        // array($row['id'],$row['categoryName'],$item['imgName'],$item['itemName']);
        $categoryId             =  $item[0];
        $categoryName           =  $item[1];
        $imgName                =  $item[2];
        $itemName               =  $item[3];

        echo "<item catId='$categoryId' catName='$categoryName' imgName='$imgName' itemName='$itemName'>";
    }
    ?>
