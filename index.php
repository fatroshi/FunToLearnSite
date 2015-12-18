<?php include_once("includes/DB/Controller.php") ?>
<?php include_once("includes/Files/Upload.php") ?>
<?php include_once("includes/layout/header.php")            // HTML header ?>
<?php include_once("includes/layout/nav.php")               // Navigation  ?>


<?php


    $controller = new Controller();


    if(isset($_POST['uploadBtn'])){

        $uploadErrors = array();
        $category = "";
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
                $controller->addCategory($category);
            }
        }
    }
?>

<div class="container">

    <div class="starter-template">
        <h1>Upload</h1>
        <form action="" method="post" enctype="multipart/form-data">

            Category (this should be id):
            <input type="text" name="category">

            Name of the item:
            <input type="text" name="name">

            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="uploadBtn">
        </form>


    </div>

</div><!-- /.container -->


<?php include_once("includes/layout/footer.php")            // HTML Footer ?>

