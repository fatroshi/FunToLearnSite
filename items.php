<?php include_once("includes/DB/Controller.php")                           ?>
<?php include_once("includes/Files/Upload.php")                            ?>
<?php include_once("includes/layout/header.php")            // HTML header ?>
<?php include_once("includes/layout/nav.php")               // Navigation  ?>

<?php
$controller = new Controller();

if(isset($_GET['delete']) && is_numeric($_GET['delete'])){

    $item = $controller->getItem($_GET['delete']);
    unlink("uploads/{$item['categoryId']}/{$item['imgName']}");
    $controller->delete($_GET['delete'],"items");
}

if(isset($_POST['uploadBtn'])){
    $uploadErrors = array();
    $category;
    $name;
    // Get input from form
    if(isset($_POST['category']) && $_POST['category'] == ""){
        $uploadErrors[] = "Category";
    }else{
        $category = $_POST['category'];
        echo $category;
    }

    if(isset($_POST['name']) && $_POST['name'] == ""){
        $uploadErrors[] = "name";
    }else{
        $name = $_POST['name'];
        echo $name;
    }

    if(count($uploadErrors) == 0){
        $upload = new Upload("uploadBtn","uploads/{$category}/");
        // If the upload was not successful display errors for user
        if(!$upload->upload()){
            foreach($upload->errors() as $error){
                echo $error . " <BR/>";
            }
        }else{
            // Store in DB
            $controller->addItem($upload->getFileName(),$name,$category);
        }
    }
}
?>

<div class="container">
    <div class="starter-template">
        <h1>Upload</h1>
        <form action="" method="post" enctype="multipart/form-data">

            Category:
            <select name="category">
            <?php
                $categories = $controller->allCategories();

                if(count($categories) > 0){
                    foreach($categories as $key => $value){
                        echo "<option value='{$key}' ";
                        if(isset($_GET['cat']) && is_numeric($_GET['cat']) && $_GET['cat'] == $key){
                            echo " SELECTED";
                        }
                        echo ">{$value}</option>";
                    }
                }
            ?>
            </select>

            <br>
            <br>

            Name of the item:
            <input type="text" name="name">

            <br>
            <br>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <br>
            <br>
            <input type="submit" value="Upload" name="uploadBtn">
        </form>
    </div>

    <hr>
    <?php
        if(isset($_GET['cat']) && is_numeric($_GET['cat'])){
            $items = $controller->getCategoryItems($_GET['cat']);
            foreach($items as $item){
                $id         =  $item[0];
                $img        =  $item[1];
                $name       =  $item[2];
                $categoryId = $item[3];

                echo "<img src='uploads/{$categoryId}/{$img}' class=\"img-thumbnail\" alt=\"{$name}\" width=\"300\">";
                echo "<a href='?delete={$id}' class='alert'>Delete</a>";
                echo "<BR>";
            }
        }

        echo "<hr>";

    ?>

</div><!-- /.container -->


<?php include_once("includes/layout/footer.php")            // HTML Footer ?>
