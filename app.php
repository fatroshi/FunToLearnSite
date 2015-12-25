<?php include_once("includes/DB/Controller.php") ?>


    <?php
    $controller = new Controller();
    $items = $controller->getAllItemsJSON();
    //$controller->var_dump($items);

//    foreach($items as $item){
//        // array($row['id'],$row['categoryName'],$item['imgName'],$item['itemName']);
//        $categoryId             =  $item[0];
//        $categoryName           =  $item[1];
//        $imgName                =  $item[2];
//        $itemName               =  $item[3];
//
//        //echo "<item catId='$categoryId' catName='$categoryName' imgName='$imgName' itemName='$itemName'>";
//    }

    $controller->var_dump($items);

    $myfile = fopen("app.json", "w") or die("Unable to open file!");
    $txt = "";
    fwrite($myfile,$items);
    fclose($myfile);
?>
