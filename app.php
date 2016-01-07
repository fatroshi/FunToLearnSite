<?php include_once("includes/DB/Controller.php") ?>
    <?php
    $controller = new Controller();
    // Get all items in encoded jason
    $items = $controller->getAllItemsJSON();
    $controller->var_dump($items);

    // Crete the json file, the andorid application will download data from this file
    $myfile = fopen("app.json", "w") or die ("Unable to open file!");
    $txt = "";
    fwrite($myfile,$items);
    fclose($myfile);
?>
