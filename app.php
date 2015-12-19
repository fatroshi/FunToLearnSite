<?php include_once("includes/DB/Controller.php") ?>


<gesmes:Envelope xmlns:gesmes="http://www.gesmes.org/xml/2002-08-01" xmlns="http://www.ecb.int/vocabulary/2002-08-01/eurofxref">
    <gesmes:subject>Reference rates</gesmes:subject>
    <gesmes:Sender>
        <gesmes:name>European Central Bank</gesmes:name>
    </gesmes:Sender>
    <Cube

<?php
    $controller = new Controller();

    $items = $controller->getAllItems();

    //$controller->var_dump($items);
    ?>

    <Cube time="2015-11-06">
    <?php

    foreach($items as $item){
        // array($row['id'],$row['categoryName'],$item['imgName'],$item['itemName']);
        $categoryId             =  $item[0];
        $categoryName           =  $item[1];
        $imgName                =  $item[2];
        $itemName               =  $item[3];

        //<Cube currency="USD" rate="1.0864"/>

        echo "Category Id: " . $categoryId . "<BR>";
        echo "Category name: " . $categoryName  . "<BR>";
        echo "Item name: " . $itemName  . "<BR>";
        echo "Image: " . $imgName    . "<BR>";
        echo "<Cube catId='$categoryId' catName='$categoryName' imgName='$imgName' itemName='$itemName'>";

    }

    ?>
        </Cube>

    </Cube>
</gesmes:Envelope>